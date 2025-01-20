const langForm = document.querySelector('#langForm');
const langField = langForm.querySelector('select[name="lang"]');

langField.addEventListener('change', ()=>{
    langForm.submit()
})   
