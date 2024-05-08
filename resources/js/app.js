import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import './bootstrap';


const forms = document.querySelectorAll('.api-group');
const selectTable = document.querySelectorAll('.select-table');
const allCodes = document.querySelectorAll('code');

forms.forEach(form => {
    const code = form.parentElement.querySelector('code');

    form.addEventListener('submit', (e) => {
        allCodes.forEach(code => {
            code.innerText = "";
        })
        e.preventDefault()
        const formData = new FormData(form)
        const method = form.querySelector('.input-text').getAttribute('data-method');
        formData.append('method', method);

        fetch('/api-usage/getAll', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            code.innerText += JSON.stringify(data.response, null, 2);

        })
    })
})

selectTable.forEach(select => {
    select.addEventListener('change', (e) => {

        const selectParent = select.parentElement;

        const form = select.nextElementSibling;
        let inputUrl = form.querySelectorAll('.input-text')[0]
        const formGroups = selectParent.querySelectorAll('.form-group')
        formGroups.forEach(element => {
            element.style.display = "none"
        })
        inputUrl.value = inputUrl.value.slice(0, 26)
        inputUrl.value += e.target.value

        document.querySelector(`#${selectParent.id}-${e.target.value}`).style.display = 'block';
    })
})

const productModalAdd = document.querySelector('#modal-add');
const addProductBtn = document.querySelector('#add');
const closeModalBtns = document.querySelectorAll('#close-modal');
const productModalEdit = document.querySelector('#modal-edit');
const productsTable = document.querySelector('#table');
const allProductsId = document.querySelectorAll('.product-id-td')

allProductsId.forEach(id => {
    id.addEventListener('mouseenter', (event) => {
        const popOver = event.target.nextElementSibling
        popOver.classList.remove('opacity-0')
        popOver.classList.remove('invisible')
    })
    id.addEventListener('mouseout', (event) => {
        const popOver = event.target.nextElementSibling
        popOver.classList.add('opacity-0')
        popOver.classList.add('invisible')

    })
})
closeModalBtns.forEach(btn => {
    btn.addEventListener("click", (event) => {
        event.target.closest('.modal').classList.add('hidden')

    })
})

if(productsTable){
    productsTable.addEventListener("click", (event) => {
        if(event.target.className.includes('edit-btn')){
            productModalEdit.classList.remove('hidden')

            const row = event.target.closest('.row')
            const tds = row.querySelectorAll('.td')

            const formEditInputs = productModalEdit.querySelectorAll('.form-edit .edit-input')

            formEditInputs.forEach((input, index) => {
                if(tds[index].children.length > 0) {
                    input.value = tds[index].children[0].innerText
                }
                else {
                    if(input.type == 'number'){
                        input.value = tds[index].innerText.replace(/\D/g, "");
                    }
                    else input.value = tds[index].innerText
                }

            })
        }
    })
}

if(addProductBtn){
    addProductBtn.addEventListener("click", () => {
        productModalAdd.classList.remove('hidden')
    })
}

