document.addEventListener("DOMContentLoaded", ()=> {

    const form = document.querySelector(".reg-form");
    const name = document.querySelector("#name");
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");
    const confirmPassword = document.querySelector("#confirmPassword");
    const tipoDocument = document.querySelector("select[name='tipoDocument']");
    const numDocument = document.querySelector("#numDocument");

    function setError(input, message) {
        const field = input.closest(".form-field");
        const error = field.querySelector(".field-error");

        field.classList.add("has-error");
        field.classList.remove("is-valid");
        error.textContent = message;
    }

    function setSuccess(input) {
        const field = input.closest(".form-field");
        const error = field.querySelector(".field-error");

        field.classList.remove("has-error");
        field.classList.add("is-valid");
        error.textContent = "";
    }


    name.addEventListener("input", () => {
        if (name.value.trim().length < 3) {
            setError(name, "Mínimo 3 caracteres");
        } else {
            setSuccess(name);
        }
    });

  
    email.addEventListener("input", () => {
        const value = email.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (value === "") {
            setError(email, "El correo es obligatorio");
        }else if (!emailRegex.test(value)) {
            setError(email, "Correo no valido");
        }else if (!value.includes("@")) {
            setError(email, "Le falta la @ a su correo");
        }else {
            setSuccess(email);
        }
    });


    tipoDocument.addEventListener("change", () => {
        if (tipoDocument.value === "") {
            setError(tipoDocument, "Selecciona un tipo");
        } else {
            setSuccess(tipoDocument);
        }
    });

  
    numDocument.addEventListener("input", () => {
        const numero = Number(numDocument.value);
        if (numDocument.value.trim().length < 6) {
            setError(numDocument, "Número muy corto");
        }else if(numDocument.value.trim() == ' ' && numDocument.value.includes(' ')){
            setError(numDocument, "No coloque espacios")
        }else if(!/^\d+$/.test(numDocument.value)){
            setError(numDocument, "No tiene un valor reconocible");
        }else if(numero<0){
            setError(numDocument, "La cedula no puede ser un número negativo");
        }else {
            setSuccess(numDocument);
        }
    });


    const tamañoContraseña = document.querySelector("#tamaño");
    const letraMayuscula = document.querySelector("#mayuscula");
    const letraMinuscula = document.querySelector("#minuscula");
    const ruleNumber = document.querySelector("#numero");
    const caracterEspecial = document.querySelector("#caracter-especial")

    password.addEventListener("input", () => {
        const value = password.value;

        value.length >= 8 ? tamañoContraseña.classList.add("valid") : tamañoContraseña.classList.remove("valid");
        /[A-Z]/.test(value) ? letraMayuscula.classList.add("valid") : letraMayuscula.classList.remove("valid");
        /[a-z]/.test(value) ? letraMinuscula.classList.add("valid") : letraMinuscula.classList.remove("valid");
        /[0-9]/.test(value) ? ruleNumber.classList.add("valid") : ruleNumber.classList.remove("valid");
        /[!@#$%^&*(),.?":{}|<>]/.test(value) ? caracterEspecial.classList.add("valid") : caracterEspecial.classList.remove("valid");


        if (value.length >= 8 && /[A-Z]/.test(value) && /[0-9]/.test(value) && /[a-z]/.test(value) && /[!@#$%^&*(),.?":{}|<>]/.test(value)) {
            setSuccess(password);
        } else {
            setError(password, "Contraseña insegura");
        }
    });

   
    confirmPassword.addEventListener("input", () => {
        if (confirmPassword.value !== password.value) {
            setError(confirmPassword, "No coinciden");
        } else {
            setSuccess(confirmPassword);
        }
    });

   
    form.addEventListener("submit", function (e) {

        let errores = false;

        const inputs = [name, email, password, confirmPassword, tipoDocument, numDocument];

        inputs.forEach(input => {
            const field = input.closest(".form-field");

            if (!field.classList.contains("is-valid")) {
                errores = true;
            }
        });

        if (errores) {
            e.preventDefault();
        }

    });
});