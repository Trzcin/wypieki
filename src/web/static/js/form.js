"use strict";
const previewParent = document.getElementById('thumbnail-preview');
const thumbnailInput = document.getElementById('thumbnail');
const form = document.getElementById('recipe-form');
function handleImagePreview() {
    if (!thumbnailInput.files || thumbnailInput.files.length == 0) {
        if (previewParent.hasChildNodes()) {
            URL.revokeObjectURL(previewParent.firstChild.src);
            previewParent.firstChild.remove();
        }
        return;
    }
    const file = thumbnailInput.files[0];
    if (file) {
        if (previewParent.hasChildNodes()) {
            URL.revokeObjectURL(previewParent.firstChild.src);
            previewParent.firstChild.src =
                URL.createObjectURL(file);
        }
        else {
            const imgPreview = document.createElement('img');
            imgPreview.src = URL.createObjectURL(file);
            imgPreview.addEventListener('click', () => thumbnailInput.click());
            previewParent.appendChild(imgPreview);
        }
    }
}
handleImagePreview();
thumbnailInput.addEventListener('change', handleImagePreview);
form.addEventListener('reset', () => {
    if (previewParent.hasChildNodes()) {
        URL.revokeObjectURL(previewParent.firstChild.src);
        previewParent.firstChild.remove();
    }
    sessionStorage.removeItem('form');
});
form.addEventListener('change', () => {
    var _a, _b, _c, _d, _e, _f;
    const data = new FormData(form);
    console.log(data);
    const objectData = {
        name: (_a = data.get('name')) !== null && _a !== void 0 ? _a : '',
        type: (_b = data.get('type')) !== null && _b !== void 0 ? _b : '',
        tag: data.getAll('tag'),
        difficulty: (_c = data.get('difficulty')) !== null && _c !== void 0 ? _c : '',
        description: (_d = data.get('description')) !== null && _d !== void 0 ? _d : '',
        ingredients: (_e = data.get('ingredients')) !== null && _e !== void 0 ? _e : '',
        instructions: (_f = data.get('instructions')) !== null && _f !== void 0 ? _f : '',
    };
    sessionStorage.setItem('form', JSON.stringify(objectData));
});
function retriveFormData() {
    if (!sessionStorage.getItem('form'))
        return;
    const data = JSON.parse(sessionStorage.getItem('form'));
    form.elements['name'].value = data.name.toString();
    form.elements['type'].value = data.type.toString();
    form.elements['difficulty'].value =
        data.difficulty.toString();
    form.elements['description'].value =
        data.description.toString();
    form.elements['ingredients'].value =
        data.ingredients.toString();
    form.elements['instructions'].value =
        data.instructions.toString();
    for (const check of data.tag) {
        const checkbox = (document.getElementById(check.toString()));
        if (checkbox) {
            checkbox.checked = true;
        }
    }
}
retriveFormData();
