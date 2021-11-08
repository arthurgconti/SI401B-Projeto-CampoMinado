function nextStep() {

    if (cadastrar()) {

        const firstForm = document.getElementsByClassName("etapa-1")[0]
        const secondForm = document.getElementsByClassName("etapa-2")[0]
        const firstCircle = document.getElementsByClassName("circle")[0]
        const secondCircle = document.getElementsByClassName("circle")[1]
        const containerProgressbar = document.getElementsByClassName('container-progress')[0]
        const progressBar = document.createElement('div')


        firstForm.classList.remove('show-form')
        firstForm.classList.add('hide-form')
        firstCircle.classList.remove('active')

        secondCircle.classList.add('active')
        progressBar.setAttribute('class', 'progress-bar')
        containerProgressbar.append(progressBar)
        secondForm.classList.remove('hide-form')
        secondForm.classList.add('show-form')
    }
}