document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#lead-form');

    if (!form) {
        return;
    }

    const submitButton = form.querySelector(
        'button[type="submit"]'
    );

    const buttonLabel = submitButton?.querySelector(
        '.btn-label'
    );

    const statusBox = form.querySelector('.form-status');

    const originalButtonText =
        buttonLabel?.textContent.trim() || 'Send my request';

    function clearErrors() {
        form.querySelectorAll('.field').forEach((field) => {
            field.classList.remove('invalid');
        });

        form.querySelectorAll('.err').forEach((error) => {
            error.style.display = '';
        });

        if (statusBox) {
            statusBox.textContent = '';
        }
    }

    function showFieldError(fieldName, message) {
        const input = form.elements.namedItem(fieldName);

        if (!(input instanceof HTMLElement)) {
            return;
        }

        const fieldWrapper = input.closest('.field');
        const errorElement = fieldWrapper?.querySelector('.err');

        fieldWrapper?.classList.add('invalid');

        if (errorElement) {
            errorElement.textContent = Array.isArray(message)
                ? message[0]
                : message;

            errorElement.style.display = 'block';
        }
    }

    function validateRequiredFields() {
        let isValid = true;

        form.querySelectorAll('[required]').forEach((input) => {
            if (input.checkValidity()) {
                return;
            }

            isValid = false;

            const fieldWrapper = input.closest('.field');
            const errorElement = fieldWrapper?.querySelector('.err');

            fieldWrapper?.classList.add('invalid');

            if (errorElement) {
                errorElement.style.display = 'block';
            }
        });

        return isValid;
    }

    function setLoading(isLoading) {
        if (!submitButton) {
            return;
        }

        submitButton.disabled = isLoading;

        if (buttonLabel) {
            buttonLabel.textContent = isLoading
                ? 'Sending...'
                : originalButtonText;
        }
    }

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        clearErrors();

        if (!validateRequiredFields()) {
            if (statusBox) {
                statusBox.textContent =
                    'Please review the highlighted fields.';
            }

            return;
        }

        setLoading(true);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });

            const data = await response.json().catch(() => ({
                message: 'An unexpected error occurred.',
            }));

            if (response.status === 422) {
                Object.entries(data.errors || {}).forEach(
                    ([fieldName, messages]) => {
                        showFieldError(fieldName, messages);
                    }
                );

                if (statusBox) {
                    statusBox.textContent =
                        'Please review the highlighted fields.';
                }

                return;
            }

            if (!response.ok) {
                throw new Error(
                    data.message ||
                    'The request could not be sent.'
                );
            }

            form.reset();

            const successUrl = form.dataset.successUrl;

            if (successUrl) {
                window.location.assign(successUrl);
                return;
            }

            if (statusBox) {
                statusBox.textContent =
                    data.message ||
                    'Your request has been received successfully.';
            }
        } catch (error) {
            if (statusBox) {
                statusBox.textContent =
                    error instanceof Error
                        ? error.message
                        : 'The request could not be sent.';
            }
        } finally {
            setLoading(false);
        }
    });
});
