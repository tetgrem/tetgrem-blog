// Custom Scripts
(function () {
    'use strict'
    // Получите все формы, к которым мы хотим применить пользовательские стили проверки Bootstrap
    let forms = document.querySelectorAll('.needs-validation')

    // Зацикливайтесь на них и предотвращайте отправку
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})();

const bsTab = new bootstrap.Tab('#myTab')

const triggerTabList = document.querySelectorAll('#myTab button')
triggerTabList.forEach(triggerEl => {
    const tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', event => {
        event.preventDefault()
        tabTrigger.show()
    })
})



function categoryCheck() {
    const categoryName = document.getElementById('category_name1')
    const categoryLink = document.getElementById('category_link1')
    const categoryBtn = document.querySelector('.category__btn1')

    categoryLink.addEventListener('keyup', () => {
        if (categoryName.value.length > 1 && categoryLink.value.length > 1) {
            categoryBtn.removeAttribute("disabled");
        } else {
            categoryBtn.setAttribute('disabled', 'true')
        }
    })
    categoryName.addEventListener('keyup', () => {
        if (categoryName.value.length > 1 && categoryLink.value.length > 1) {
            categoryBtn.removeAttribute("disabled");
        } else {
            categoryBtn.setAttribute('disabled', 'true')
        }
    })
}




function passCheck() {

    const passInput = document.getElementById('password')
    const passConfInput = document.getElementById('password_confirm')

    const passFeedBack = document.querySelector('.invalid-feedback-pass')
    const passConfFeedBack = document.querySelector('.invalid-feedback-pass-conf')
    const button = document.querySelector('.register__btn')

    passInput.addEventListener('keyup', () => {
        if (passInput.value.length < 6) {
            passFeedBack.innerHTML = `Пароль дуже короткий. Мінімальна кількість символів - 6.`
        }

        if (passInput.value.length > 5) {
            passFeedBack.innerHTML = ``
        }
    })


    passConfInput.addEventListener('keyup', () => {
        if (passConfInput.value !== passInput.value) {
            passConfFeedBack.innerHTML = `Паролі не співпадають!`
            button.setAttribute('disabled', 'true')
        } else if (passInput.value.length > 5 && passConfInput.value.length > 5 && passConfInput.value === passInput.value) {
            passConfFeedBack.innerHTML = ``
            button.removeAttribute("disabled");
        }
    })

}


function hideMessage() {
    const message = document.querySelector('#liveToast')
    setTimeout(() => message.style.opacity = '0', 4000)
    // setTimeout(() => message.style.display = 'none', 3100)
}

hideMessage();



function burgerMenu() {
    const burger = document.querySelector('.burger')
    const menu = document.querySelector('.menu')
    const body = document.querySelector('body')
    burger.addEventListener('click', () => {
        if (!menu.classList.contains('active')) {
            menu.classList.add('active')
            burger.classList.add('active')
            body.classList.add('locked')
        } else {
            menu.classList.remove('active')
            burger.classList.remove('active')
            body.classList.remove('locked')
        }
    })
    // Вот тут мы ставим брейкпоинт навбара
    window.addEventListener('resize', () => {
        if (window.innerWidth > 991.98) {
            menu.classList.remove('active')
            burger.classList.remove('active')
            body.classList.remove('locked')
        }
    })
}
burgerMenu()

