const currentpage = document.querySelectorAll('.list-group-item');
            
currentpage.forEach((panel) => {
    panel.addEventListener('click', () => {
        removeActiveClasses();
        panel.classList.add('sidebar-active');
    })
})

function removeActiveClasses(){
    currentpage
    .forEach(panel => {
        panel.classList.remove('sidebar-active');
    })
}