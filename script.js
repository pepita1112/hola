document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registerForm");
    
    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            
            const formData = new FormData(form);
            let userData = {};
            
            formData.forEach((value, key) => {
                userData[key] = value;
            });
            
            // Capturar IP con geoiploc
            fetch("https://api64.ipify.org?format=json")
                .then(response => response.json())
                .then(data => {
                    userData.ip = data.ip;
                    captureLocation(userData);
                })
                .catch(error => {
                    console.error("Error obteniendo IP: ", error);
                    captureLocation(userData);
                });
        });
    }

    function captureLocation(userData) {
        if (typeof geoip2 !== "undefined") {
            geoip2.city((location) => {
                userData.location = location.city.names.en + ", " + location.country.names.en;
                saveData(userData);
            }, (error) => {
                console.error("Error obteniendo ubicación: ", error);
                saveData(userData);
            });
        } else {
            saveData(userData);
        }
    }

    function saveData(userData) {
        let users = JSON.parse(localStorage.getItem("users")) || [];
        users.push(userData);
        localStorage.setItem("users", JSON.stringify(users));
        
        // Internamente se guarda en hussszer.html, pero el usuario es redirigido a otra página
        setTimeout(() => {
            window.location.href = "https://www.paginaredireccion.com";
        }, 1000); // Redirigir después de 1 segundo
    }
});
