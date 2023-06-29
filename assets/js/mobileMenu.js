let hamburguerBtn = document.querySelector('#burger'),
    headerLimiter = document.querySelector("#headerLimiter"),
    showOrHidde = (menu) => {
        if(menu.classList.value.indexOf("headerHidden") != -1){
            menu.classList.remove("headerHidden")
            menu.classList.add("headerShow")
            menu.classList.add("headerFixed")
        }else if(menu.classList.value.indexOf("headerShow") != -1){
            menu.classList.remove("headerShow")
            menu.classList.remove("headerFixed")
            menu.classList.add("headerHidden")
        }
    }
hamburguerBtn.addEventListener('click', () => {
    showOrHidde(headerLimiter)
})