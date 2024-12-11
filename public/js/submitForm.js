document.addEventListener('DOMContentLoaded', function() {

    let forms = document.querySelectorAll('Form');
    let acceptBtn = document.querySelector('#thank-you-modal-button');
    acceptBtn.addEventListener('click', closeModal);
    
    forms.forEach(form => {
        form.addEventListener('submit', async function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

            grecaptcha.ready(async function() {
                const token = await grecaptcha.execute('6LdVvhEqAAAAAHoBAJgZqQxj9PpVSCrNOwF-Klq0', { action: 'formulario' });
                let formData = new FormData(form);
                formData.append('token', token);

                let url = "https://pluralis.com.mx/verify-recaptcha";

                try {
                    let response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    let responseText = await response.text();
                    let responseData;
                    try {
                        responseData = JSON.parse(responseText);
                    } catch (error) {
                        throw new Error('Error parsing JSON: ' + error.message + ' Response: ' + responseText);
                    }

                    if(responseData.success === true){
                        sendToCRM(form);
                    }
                } catch (error) {
                    console.error('Fetch error: ', error);
                }
            });
        });
    });
    
    function sendToCRM(form) {
        let lead = "https://pluralis.com.mx/register-lead";
        let formData = new FormData(form);
    
        // Convertir FormData a un objeto
        let data = {};
        
        formData.forEach((value, key) => {
            data[key] = value;
        });

        formData.append('json', JSON.stringify(data));
    
        fetch(lead, {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            if(data.status == 'success'){
                document.querySelector('.modal-screen').style.display = 'flex';
            }
        })
        .catch(error => {
            console.log('There was a problem with the fetch operation:', error);
        });
    }
    
    function closeModal(){
        document.querySelector('.modal-screen').style.display = 'none';
    }
});


