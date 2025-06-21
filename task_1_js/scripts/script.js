
const first_btn = document.querySelector('#first-btn');
const second_btn = document.querySelector('#second-btn');
const paragraph = document.querySelector('#paragraph');

function toggleParagraph() {
    paragraph.toggleAttribute("hidden")
}

window.onload = () => {
    let first_btn_pressed = false;

    first_btn.addEventListener("click", () => {
        first_btn_pressed = true;
    })

    second_btn.addEventListener("click", () => {
        if(first_btn_pressed) toggleParagraph();
        first_btn_pressed = false;
    })
}