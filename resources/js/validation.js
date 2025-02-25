document.addEventListener('DOMContentLoaded', function() {
    // Валидация формы регистрации
    const registerForm = document.querySelector('form[action*="register"]');
    if (registerForm) {
        const phoneInput = registerForm.querySelector('input[name="phone"]');
        phoneInput?.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                value = '8(' + value.substring(1, 4) + ')-' + 
                    value.substring(4, 7) + '-' + 
                    value.substring(7, 9) + '-' + 
                    value.substring(9, 11);
            }
            e.target.value = value;
        });

        registerForm.addEventListener('submit', function(e) {
            const password = registerForm.querySelector('input[name="password"]');
            if (!/\d/.test(password.value)) {
                e.preventDefault();
                alert('Пароль должен содержать хотя бы одну цифру');
            }
        });
    }

    // Валидация формы бронирования
    const bookingForm = document.querySelector('form[action*="bookings"]');
    if (bookingForm) {
        const dateInput = bookingForm.querySelector('input[name="booking_date"]');
        if (dateInput) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            dateInput.min = tomorrow.toISOString().split('T')[0];
        }
    }
});