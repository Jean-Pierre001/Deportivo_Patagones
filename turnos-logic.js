/// Constantes de precios y reglas
const CATERING_FIXED_PRICE = 15000;
const QUINCHO_HOUR_PRICE = 2000;
const KITCHEN_USE_PRICE = 3000; 

// Variables globales
let selectedDate = null;
let selectedTimeSlots = []; 
let rangeSelectionStart = null; 
let selectedFacility = null; 
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
        
const BUSINESS_HOURS_RULES = {
    DEFAULT: { start: 8, end: 22 }, 
    futbol: { 
        '1': { start: 8, end: 23 }, '2': { start: 8, end: 23 }, '3': { start: 8, end: 23 }, '4': { start: 8, end: 23 }, '5': { start: 8, end: 23 }, 
        '6': { start: 8, end: 25 }, 
        '0': { start: 9, end: 20 }
    },
    salon: {
        '1': { start: 14, end: 27 }, '2': { start: 14, end: 27 }, '3': { start: 14, end: 27 }, '4': { start: 14, end: 27 },
        '5': { start: 12, end: 30 }, '6': { start: 12, end: 30 },
        '0': { start: 12, end: 23 }
    },
    albergue: {
        DEFAULT: { start: 9, end: 22 }
    }
}; 

const UNAVAILABLE_SLOTS_DATA = {
    // Ejemplo: 'YYYY-MM-DD': ['18', '19', '25']
    '2025-10-15': ['18', '19', '25'], 
    '2025-10-16': ['10', '11']
};

let UNAVAILABLE_SLOTS = []; 

const formatter = new Intl.NumberFormat('es-AR', {
    style: 'decimal',
    minimumFractionDigits: 0
});

// --- FUNCIONES CORE ---

// 1. CARGA DE DATOS DE LA INSTALACIÓN
function loadFacilityData() {
    const facilityDataString = localStorage.getItem('selectedFacility');
    if (facilityDataString) {
        selectedFacility = JSON.parse(facilityDataString);
        document.getElementById('facility-name-header').textContent = selectedFacility.name;
        document.getElementById('selected-facility').textContent = selectedFacility.name;
        
        const salonExtras = document.getElementById('salon-extras');
        const futbolAlbergueExtras = document.getElementById('futbol-albergue-extras');
        
        if (selectedFacility.category === 'salon') {
            salonExtras.style.display = 'block';
            futbolAlbergueExtras.style.display = 'none';
        } else if (selectedFacility.category === 'futbol' || selectedFacility.category === 'albergue') {
            salonExtras.style.display = 'none';
            futbolAlbergueExtras.style.display = 'block';
        } else {
            salonExtras.style.display = 'none';
            futbolAlbergueExtras.style.display = 'none';
        }
    } else {
        document.getElementById('facility-name-header').textContent = 'Error: No se seleccionó instalación.';
    }
}

// 2. FUNCIÓN PARA GENERAR Y MOSTRAR SLOTS DE TIEMPO
function displayTimeSlots(startHour, endHour, unavailableSlots) {
    const timeSlotsContainer = document.getElementById('time-slots');
    timeSlotsContainer.innerHTML = '';
    selectedTimeSlots = []; 
    rangeSelectionStart = null;
    document.getElementById('reservation-warning').classList.add('hidden');

    for (let h = startHour; h < endHour; h++) {
        let displayHour = h % 24; 
        let displayNextHour = (h + 1) % 24;

        const timeText = 
            `${String(displayHour).padStart(2, '0')}:00 - ${String(displayNextHour).padStart(2, '0')}:00`; 
        
        const hourValue = String(h);
        const isUnavailable = unavailableSlots.includes(hourValue);
        
        const slot = document.createElement('div');
        slot.className = `time-slot p-2 rounded-lg text-center text-sm font-medium border ${isUnavailable ? 'unavailable' : 'bg-gray-100 hover:bg-gray-200 border-gray-300'}`;
        slot.setAttribute('data-hour', hourValue);
        slot.textContent = timeText;

        if (!isUnavailable) {
            slot.addEventListener('click', handleTimeSlotClick);
            slot.addEventListener('mouseenter', handleTimeSlotHover);
            slot.addEventListener('mouseleave', handleTimeSlotLeave);
        } else {
            // Asumiendo que existe un modal de lista de espera
            slot.addEventListener('click', () => showWaitlistModal(timeText)); 
        }

        timeSlotsContainer.appendChild(slot);
    }
    document.getElementById('time-selection-area').style.display = 'block';
    updateReservationDetails();
}

// 3. LÓGICA DE SELECCIÓN DE RANGO (CLICK)
function handleTimeSlotClick(event) {
    const clickedHour = parseInt(event.target.getAttribute('data-hour'));
    
    document.getElementById('reservation-warning').classList.add('hidden');

    if (rangeSelectionStart === null) {
        // INICIO DE SELECCIÓN
        rangeSelectionStart = clickedHour;
        selectTimeRange(clickedHour, clickedHour);
    } else {
        // FIN DE SELECCIÓN
        const start = Math.min(rangeSelectionStart, clickedHour);
        const end = Math.max(rangeSelectionStart, clickedHour);
        
        let isOccupiedInRange = false;
        let occupiedHour = null;
        for (let h = start; h <= end; h++) {
            if (UNAVAILABLE_SLOTS.includes(String(h))) {
                isOccupiedInRange = true;
                occupiedHour = h;
                break;
            }
        }
        
        if (isOccupiedInRange) {
            // *** ERROR DETECTADO: RANGO INVÁLIDO. MANTENEMOS EL PUNTO DE INICIO. ***
            const occupiedTimeText = `${String(occupiedHour % 24).padStart(2, '0')}:00 - ${String((occupiedHour + 1) % 24).padStart(2, '0')}:00`;
            document.getElementById('warning-hour').textContent = occupiedTimeText;
            document.getElementById('reservation-warning').classList.remove('hidden');
            
            // Re-seleccionar el punto de inicio para que el usuario elija un nuevo final
            selectTimeRange(rangeSelectionStart, rangeSelectionStart); 
            // rangeSelectionStart NO se resetea aquí.
        } else {
            // RANGO VÁLIDO
            selectTimeRange(start, end);
            rangeSelectionStart = null; // Resetear SÓLO si la selección es exitosa
        }

        updateReservationDetails();
    }
}

// 4. LÓGICA DE HOVER (VISUALIZACIÓN DE RANGO)
function handleTimeSlotHover(event) {
    if (rangeSelectionStart !== null) {
        const hoverHour = parseInt(event.target.getAttribute('data-hour'));
        const start = Math.min(rangeSelectionStart, hoverHour);
        const end = Math.max(rangeSelectionStart, hoverHour);
        
        document.querySelectorAll('.time-slot').forEach(slot => slot.classList.remove('range-hover'));
        
        for (let h = start; h <= end; h++) {
            const slot = document.querySelector(`.time-slot[data-hour="${h}"]`);
            if (slot && !slot.classList.contains('unavailable')) {
                slot.classList.add('range-hover');
            }
        }
    }
}

function handleTimeSlotLeave(event) {
    if (rangeSelectionStart !== null) {
        document.querySelectorAll('.time-slot').forEach(slot => slot.classList.remove('range-hover'));
    }
}

// 5. FUNCIÓN DE SELECCIÓN DE SLOTS
function selectTimeRange(start, end) {
    selectedTimeSlots = [];
    document.querySelectorAll('.time-slot').forEach(slot => {
        const hour = parseInt(slot.getAttribute('data-hour'));
        slot.classList.remove('selected', 'range-hover');
        
        if (hour >= start && hour <= end) {
            slot.classList.add('selected');
            selectedTimeSlots.push(String(hour));
        }
    });
    updateReservationDetails();
}

// 6. FUNCIÓN PARA ACTUALIZAR DETALLES Y PRECIOS DE RESERVA
function updateReservationDetails() {
    if (!selectedFacility) return;

    const facilityPrice = parseInt(selectedFacility.price) || 0;
    
    let totalFacilityPrice = 0;
    
    // El precio se calcula por la cantidad de horas seleccionadas
    totalFacilityPrice = facilityPrice * selectedTimeSlots.length;
    

    let extrasPrice = 0;
    let extrasSummaryHtml = '';
    let quinchoHours = 0;

    // 1. Catering (Solo Salones)
    const cateringCheckbox = document.getElementById('catering-checkbox');
    if (cateringCheckbox && cateringCheckbox.checked && selectedFacility.category === 'salon') {
        extrasPrice += CATERING_FIXED_PRICE;
        extrasSummaryHtml += `<div class="flex justify-between mb-1"><span class="text-gray-600">Catering:</span><span class="font-medium text-secondary">$${formatter.format(CATERING_FIXED_PRICE)}</span></div>`;
    }

    // 2. Quincho Adicional (Canchas/Albergues)
    const quinchoSelect = document.getElementById('quincho-hours-select');
    quinchoHours = quinchoSelect ? parseInt(quinchoSelect.value) : 0;
    if (quinchoHours > 0 && (selectedFacility.category === 'futbol' || selectedFacility.category === 'albergue')) {
        const quinchoPrice = quinchoHours * QUINCHO_HOUR_PRICE;
        extrasPrice += quinchoPrice;
        extrasSummaryHtml += `<div class="flex justify-between mb-1"><span class="text-gray-600">Quincho (${quinchoHours}h):</span><span class="font-medium text-primary">$${formatter.format(quinchoPrice)}</span></div>`;
    }

    // 3. Uso de Cocina (Canchas/Albergues)
    const kitchenCheckbox = document.getElementById('kitchen-use-checkbox');
    if (kitchenCheckbox && kitchenCheckbox.checked && (selectedFacility.category === 'futbol' || selectedFacility.category === 'albergue')) {
        extrasPrice += KITCHEN_USE_PRICE;
        extrasSummaryHtml += `<div class="flex justify-between mb-1"><span class="text-gray-600">Uso de Cocina:</span><span class="font-medium text-primary">$${formatter.format(KITCHEN_USE_PRICE)}</span></div>`;
    }

    let totalReservationPrice = totalFacilityPrice + extrasPrice;
    
    const selectedTimeDisplay = document.getElementById('selected-time-display');
    selectedTimeDisplay.innerHTML = '';
    
    if (selectedTimeSlots.length > 0) {
        const minHour = Math.min(...selectedTimeSlots.map(h => parseInt(h)));
        const maxHour = Math.max(...selectedTimeSlots.map(h => parseInt(h)));
        
        const startTime = `${String(minHour % 24).padStart(2, '0')}:00`;
        const endTime = `${String((maxHour + 1) % 24).padStart(2, '0')}:00`;
        
        selectedTimeDisplay.innerHTML = `<span class="text-base">${startTime} - ${endTime}</span>`;
    } else {
        selectedTimeDisplay.innerHTML = `<span class="italic text-gray-400">Selecciona tu rango horario.</span>`;
    }

    const totalHoursDisplay = document.getElementById('total-hours');
    totalHoursDisplay.textContent = selectedTimeSlots.length + (quinchoHours > 0 ? ` +${quinchoHours}h (Quincho)` : '');
    
    document.getElementById('extras-summary').innerHTML = extrasSummaryHtml;
    
    document.getElementById('total-reservation-price').textContent = `$${formatter.format(totalReservationPrice)}`;
    let deposit = Math.max(5000, Math.round(totalReservationPrice * 0.3)); // Mínimo de seña de $5000
    document.getElementById('deposit-price').textContent = `$${formatter.format(deposit)}`;

    const goToCheckoutBtn = document.getElementById('go-to-checkout-btn');
    if (selectedTimeSlots.length === 0) {
        goToCheckoutBtn.disabled = true;
        goToCheckoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
    } else {
        goToCheckoutBtn.disabled = false;
        goToCheckoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    }
}


// 7. FUNCIÓN PARA GENERAR Y RENDERIZAR EL CALENDARIO (LÓGICA ACTUALIZADA)
function renderCalendar(month, year) {
    const monthYearText = document.getElementById('current-month-year');
    const daysContainer = document.getElementById('calendar-days');
    
    const date = new Date(year, month);
    const firstDayOfMonth = new Date(year, month, 1).getDay(); 
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    
    const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    monthYearText.textContent = `${monthNames[month]} ${year}`;

    daysContainer.innerHTML = ''; 

    // Rellenar días del mes anterior (estos no son clicleables)
    const prevMonthDays = new Date(year, month, 0).getDate();
    for (let i = 0; i < firstDayOfMonth; i++) {
        const day = document.createElement('span');
        day.className = 'text-gray-400 p-2';
        day.textContent = prevMonthDays - firstDayOfMonth + i + 1;
        daysContainer.appendChild(day);
    }

    const today = new Date();
    // Normalizar la fecha de hoy para comparación (año, mes, día)
    const todayNormalized = new Date(today.getFullYear(), today.getMonth(), today.getDate()); 
    
    // Días del mes actual
    for (let day = 1; day <= daysInMonth; day++) {
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const dayElement = document.createElement('div');
        dayElement.textContent = day;
        dayElement.setAttribute('data-date', dateStr);
        dayElement.className = 'day p-2 rounded cursor-pointer transition-colors duration-150';

        const dayDate = new Date(year, month, day);

        // Lógica para deshabilitar días pasados
        let isPast = dayDate < todayNormalized;

        if (isPast) {
            dayElement.classList.add('text-gray-400', 'cursor-not-allowed', 'bg-gray-200');
        } else {
            dayElement.classList.add('hover:bg-primary/20');
            
            // Marcar el día seleccionado previamente
            if (dateStr === selectedDate) {
                dayElement.classList.add('bg-primary', 'text-white', 'selected-day');
            }
            
            dayElement.addEventListener('click', handleDayClick);
        }
        
        daysContainer.appendChild(dayElement);
    }
    
    // Rellenar días del mes siguiente (inactivos)
    const totalCells = firstDayOfMonth + daysInMonth;
    const nextDaysCount = (7 - (totalCells % 7)) % 7; 
    
    for (let i = 1; i <= nextDaysCount; i++) {
        const day = document.createElement('span');
        day.className = 'text-gray-400 p-2';
        day.textContent = i;
        daysContainer.appendChild(day);
    }
}

function prevMonth() {
    // No permitir ir al mes pasado del actual
    const today = new Date();
    if (currentYear === today.getFullYear() && currentMonth === today.getMonth()) {
        return;
    }
    
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    selectedDate = null; 
    renderCalendar(currentMonth, currentYear);
}

function nextMonth() {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    selectedDate = null; 
    renderCalendar(currentMonth, currentYear);
}

function initializeCalendar() {
    renderCalendar(currentMonth, currentYear);
    
    // Intentar seleccionar el día de hoy por defecto si no hay una fecha ya seleccionada
    const today = new Date();
    const formattedToday = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;

    const todayElement = document.querySelector(`.day[data-date="${formattedToday}"]`);
    if (todayElement) {
        handleDayClick({ target: todayElement });
    }
}

function handleDayClick(event) {
    const dayElement = event.target;
    const date = dayElement.getAttribute('data-date');
    if (!date || dayElement.classList.contains('cursor-not-allowed')) return;

    // Limpiar selección previa
    document.querySelectorAll('.day').forEach(d => d.classList.remove('bg-primary', 'text-white', 'selected-day'));
    
    // Aplicar nueva selección
    dayElement.classList.add('bg-primary', 'text-white', 'selected-day');
    
    selectedDate = date;
    document.getElementById('calendar-display-text').textContent = date;
    document.getElementById('selected-date-display').textContent = date;
    
    // Cargar slots para la fecha seleccionada
    const dateObject = new Date(date);
    const day = dateObject.getDay(); // 0 (Dom) a 6 (Sáb)
    const category = selectedFacility ? selectedFacility.category : 'DEFAULT';
    const rules = BUSINESS_HOURS_RULES[category] || BUSINESS_HOURS_RULES.DEFAULT;
    const dailyRules = rules[day] || rules.DEFAULT || { start: 8, end: 22 };
    
    // Simular carga de turnos no disponibles
    UNAVAILABLE_SLOTS = UNAVAILABLE_SLOTS_DATA[date] || []; 
    
    displayTimeSlots(dailyRules.start, dailyRules.end, UNAVAILABLE_SLOTS);
}

// 8. FUNCIÓN PARA IR AL CHECKOUT
function goToCheckout() {
    if (!selectedFacility || selectedDate === null || selectedTimeSlots.length === 0) {
         alert('Por favor, selecciona una instalación, una fecha y al menos un turno.');
         return;
    }
    
    const totalPriceText = document.getElementById('total-reservation-price').textContent;
    const depositText = document.getElementById('deposit-price').textContent;
    
    const reservationData = {
        facility: selectedFacility,
        date: selectedDate,
        timeSlots: selectedTimeSlots,
        // *** CORRECCIÓN DE ROBUSTEZ: Limpiamos todos los caracteres no numéricos antes de parsear ***
        totalPrice: parseInt(totalPriceText.replace(/[^0-9]/g, '')),
        deposit: parseInt(depositText.replace(/[^0-9]/g, '')),
        catering: document.getElementById('catering-checkbox') ? document.getElementById('catering-checkbox').checked : false,
        quinchoHours: document.getElementById('quincho-hours-select') ? parseInt(document.getElementById('quincho-hours-select').value) : 0,
        kitchenUse: document.getElementById('kitchen-use-checkbox') ? document.getElementById('kitchen-use-checkbox').checked : false,
    };
    
    localStorage.setItem('finalReservation', JSON.stringify(reservationData));
    window.location.href = 'checkout.html';
}

// 9. FUNCIÓN PARA MOSTRAR MODAL DE LISTA DE ESPERA
function showWaitlistModal(timeText) {
    // Se asume la existencia de un modal con id='waitlist-modal' y id='waitlist-hour'
    // La implementación del modal en sí no está en este archivo.
    const waitlistModal = document.getElementById('waitlist-modal');
    if (waitlistModal) {
        document.getElementById('waitlist-hour').textContent = timeText;
        waitlistModal.classList.remove('hidden');
    }
}

// --- EVENT LISTENERS Y SETUP INICIAL ---

document.addEventListener('DOMContentLoaded', () => {
    // Si la librería Feather Icons está disponible
    if (typeof feather !== 'undefined' && typeof feather.replace === 'function') {
        feather.replace();
    }
    
    loadFacilityData(); 
    initializeCalendar(); 

    document.getElementById('show-calendar-btn').addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('.calendar-container').classList.toggle('open');
    });

    if (document.getElementById('prev-month-btn')) {
        document.getElementById('prev-month-btn').addEventListener('click', prevMonth);
    }
    if (document.getElementById('next-month-btn')) {
        document.getElementById('next-month-btn').addEventListener('click', nextMonth);
    }

    if (document.getElementById('catering-checkbox')) {
        document.getElementById('catering-checkbox').addEventListener('change', function() {
            const allergySection = document.getElementById('allergy-section');
            if (allergySection) {
                 allergySection.style.display = this.checked ? 'block' : 'none';
            }
            updateReservationDetails(); 
        });
    }

    if (document.getElementById('quincho-hours-select')) {
        document.getElementById('quincho-hours-select').addEventListener('change', updateReservationDetails);
    }
    
    if (document.getElementById('kitchen-use-checkbox')) {
        document.getElementById('kitchen-use-checkbox').addEventListener('change', updateReservationDetails);
    }

    document.getElementById('go-to-checkout-btn').addEventListener('click', goToCheckout);
    
    // Asumiendo los ID de botones/modales para lista de espera
    if(document.getElementById('cancel-waitlist')) {
        document.getElementById('cancel-waitlist').addEventListener('click', () => {
            const waitlistModal = document.getElementById('waitlist-modal');
            if (waitlistModal) waitlistModal.classList.add('hidden');
        });
    }
    
    if(document.getElementById('go-to-checkout-modal')){
         document.getElementById('go-to-checkout-modal').addEventListener('click', goToCheckout);
    }
    
    if(document.getElementById('close-modal-conf')){
         document.getElementById('close-modal-conf').addEventListener('click', () => {
            const confirmationModal = document.getElementById('confirmation-modal');
            if (confirmationModal) confirmationModal.classList.add('hidden');
         });
    }
});