window.addEventListener('load', showAdminIcon);

function showAdminIcon() {
    const iconAdminBox = document.querySelectorAll('.icon-admin-box');

    iconAdminBox.forEach(adminBox => {
        let btnM = document.createElement("button");
        let btnD = document.createElement("button");
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
        adminBox.appendChild(btnM);
        adminBox.appendChild(btnD);
        btnM.appendChild(imgModify);
        btnD.appendChild(imgDelete);
    });
}