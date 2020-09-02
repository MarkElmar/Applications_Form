editButton = document.getElementById("editButton");

editButton.addEventListener('mouseup', () => {
    document.querySelectorAll(".input-l").forEach(b => b.removeAttribute
        ("disabled")
    );
    addClassById('editButton', 'hide')
    addClassById('editButton', 'toast')

    removeClassById('submit', 'toast')
    removeClassById('submit', 'hide')
})

const addClassById = (id, className) => {
    document.getElementById(id).classList.add(className)
}

const removeClassById = (id, className) => {
    document.getElementById(id).classList.remove(className)
}