const iconAdminBox = document.querySelectorAll('.icon-admin-box');
showAdminIcon();

function showAdminIcon() {
    let id = 1;

    iconAdminBox.forEach(eAdminBox => {
        let btnM = document.createElement("button");
        btnM.id = "modify" + id;
        let btnD = document.createElement("button");
        btnD.id = "delete" + id;
        let imgModify = document.createElement("img");
        let imgDelete = document.createElement("img");
        imgModify.src = "assets/img/icons/modify.png";
        imgDelete.src = "assets/img/icons/delete.png";
        imgModify.classList.add('icon-admin');
        imgDelete.classList.add('icon-admin');
        btnM.classList.add('btn-admin');
        btnD.classList.add('btn-admin');
        imgModify.setAttribute("alt", "Icone administrateur");
        imgDelete.setAttribute("alt", "Icone administrateur");
        eAdminBox.appendChild(btnM);
        eAdminBox.appendChild(btnD);
        btnM.appendChild(imgModify);
        btnD.appendChild(imgDelete);
        id++;
    });
}

iconAdminBox.forEach(eAdminBox => {
    eAdminBox.addEventListener('click', function (event) {
        if (event.target.closest('.btn-admin')) {
            const id = event.target.closest('.btn-admin').id;
            if (id.startsWith('modify')) {
                alert(`Element modifié: ${id}`);
            }
            else if (id.startsWith('delete')) {
                alert(`Element supprimé: ${id}`);
            }
        }
    });
});