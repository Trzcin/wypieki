const searchInput = <HTMLInputElement>document.getElementById('img-search');
searchInput.addEventListener('keyup', searchImage);
const photos = <HTMLDivElement>document.getElementById('photos');

async function searchImage(e: Event) {
    const res = await fetch(
        `/images/find/${(<HTMLInputElement>e.target!).value.trim()}`
    );
    if (res.status != 200) return;
    const imageMarkup = await res.text();
    photos.innerHTML = imageMarkup;
}
