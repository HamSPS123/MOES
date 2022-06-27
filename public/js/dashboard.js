var toggleBtn = document.querySelector('.admin-toggle');
var toggleNav = document.querySelector('.admin-nav');
var toggleSide = document.querySelector('.admin-side');
var toggleContent = document.querySelector('.admin-content');

toggleBtn.addEventListener('click', function(e){
    let rect = toggleSide.getBoundingClientRect();
    if(rect.x == 0){
        toggleSide.classList.add('translate-x-[-250px]')
        toggleSide.classList.remove('translate-x-0')
        toggleNav.classList.remove('pl-64')
        toggleContent.classList.remove('ml-64')
    }else{
        toggleSide.classList.remove('translate-x-[-250px]')
        toggleSide.classList.add('translate-x-0')
        toggleNav.classList.add('pl-64')
        toggleContent.classList.add('ml-64')
    }
});


//preview Image

function previewImage() {
    return {
        imageUrl: "",

        fileChosen(event) {
            this.fileToDataUrl(event, (src) => (this.imageUrl = src));
        },

        fileToDataUrl(event, callback) {
            if (!event.target.files.length) return;

            let file = event.target.files[0],
                reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = (e) => callback(e.target.result);
        },
    };
}
