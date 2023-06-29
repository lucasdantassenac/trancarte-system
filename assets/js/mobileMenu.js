let hamburguerBtn = document.querySelector('#burger'),
    headerLimiter = document.querySelector("#headerLimiter"),
    header = document.querySelector("header"),
    showOrHidde = (menu, header) => {
        if(menu.classList.value.indexOf("headerHidden") != -1){
            menu.classList.remove("headerHidden")
            menu.classList.add("headerShow")
            header.classList.add("headerFixed")
        }else if(menu.classList.value.indexOf("headerShow") != -1){
            menu.classList.remove("headerShow")
            header.classList.remove("headerFixed")
            menu.classList.add("headerHidden")
        }
    }
hamburguerBtn.addEventListener('click', () => {
    showOrHidde(headerLimiter, header)
})