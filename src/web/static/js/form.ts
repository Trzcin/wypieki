const previewParent = document.getElementById('thumbnail-preview')!;
const thumbnailInput = <HTMLInputElement>document.getElementById('thumbnail');
const form = <HTMLFormElement>document.getElementById('recipe-form');

function handleImagePreview() {
    if (!thumbnailInput.files || thumbnailInput.files.length == 0) {
        if (previewParent.hasChildNodes()) {
            URL.revokeObjectURL(
                (<HTMLImageElement>previewParent.firstChild).src
            );
            previewParent.firstChild!.remove();
        }
        return;
    }

    const file = thumbnailInput.files[0];
    if (file) {
        if (previewParent.hasChildNodes()) {
            URL.revokeObjectURL(
                (<HTMLImageElement>previewParent.firstChild).src
            );
            (<HTMLImageElement>previewParent.firstChild).src =
                URL.createObjectURL(file);
        } else {
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
        URL.revokeObjectURL((<HTMLImageElement>previewParent.firstChild).src);
        previewParent.firstChild!.remove();
    }

    sessionStorage.removeItem('form');
});

interface RecipeFormData {
    name: FormDataEntryValue;
    type: FormDataEntryValue;
    tag: FormDataEntryValue[];
    difficulty: FormDataEntryValue;
    description: FormDataEntryValue;
    ingredients: FormDataEntryValue;
    instructions: FormDataEntryValue;
}
form.addEventListener('change', () => {
    const data = new FormData(form);
    console.log(data);
    const objectData: RecipeFormData = {
        name: data.get('name') ?? '',
        type: data.get('type') ?? '',
        tag: data.getAll('tag'),
        difficulty: data.get('difficulty') ?? '',
        description: data.get('description') ?? '',
        ingredients: data.get('ingredients') ?? '',
        instructions: data.get('instructions') ?? '',
    };

    sessionStorage.setItem('form', JSON.stringify(objectData));
});

function retriveFormData() {
    if (!sessionStorage.getItem('form')) return;
    const data = <RecipeFormData>JSON.parse(sessionStorage.getItem('form')!);

    (<HTMLInputElement>form.elements['name']).value = data.name.toString();
    (<HTMLInputElement>form.elements['type']).value = data.type.toString();
    (<HTMLSelectElement>form.elements['difficulty']).value =
        data.difficulty.toString();
    (<HTMLInputElement>form.elements['description']).value =
        data.description.toString();
    (<HTMLInputElement>form.elements['ingredients']).value =
        data.ingredients.toString();
    (<HTMLInputElement>form.elements['instructions']).value =
        data.instructions.toString();

    for (const check of data.tag) {
        const checkbox = <HTMLInputElement | null>(
            document.getElementById(check.toString())
        );
        if (checkbox) {
            checkbox.checked = true;
        }
    }
}
retriveFormData();