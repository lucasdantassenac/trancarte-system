let btns = document.querySelectorAll(".popUpAddBtn"), 
    closePopUpBtns = document.querySelectorAll('.closePopUpBtn'),
    popUps = document.querySelectorAll(".addPopUp"),
    overlay = document.querySelector("#popUpOverlay"),
    popUpsController = {
        openButtons: (popUp, overlay) => {
            popUp.classList.toggle("hidden")
            overlay.classList.toggle('hidden')
        },
        closeMethods: (popUpsParam, overlay) => {
            popUpsParam.forEach(popUp => {
                if(!popUp.classList.contains('hidden')){
                    popUp.classList.add('hidden')
                    overlay.classList.add('hidden')
                }
            })
        }
    }

btns.forEach((btn, i) => {
    btn.addEventListener('click', () => {
        popUpsController.openButtons(popUps[i], overlay);
    })
});

closePopUpBtns.forEach((btn, i) => {
    btn.addEventListener('click', () => {
        popUpsController.closeMethods(popUps, overlay)
    })
})

overlay.addEventListener('click', () => {
    popUpsController.closeMethods(popUps, overlay)
})

document.body.addEventListener('keyup', (e) => {
    if(e.key == 'Escape') {
        popUpsController.closeMethods(popUps, overlay)
    }
})
