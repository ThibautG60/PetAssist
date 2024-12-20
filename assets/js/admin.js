window.onload = showAdminIcon;

function showAdminIcon() {
    const iconAdminBox = document.querySelectorAll('.icon-admin-box');

    iconAdminBox.forEach(adminBox => {
        let imgModify = document.createElement("img");
        let imgDelete = document.createElement("img");
        imgModify.src = "assets/img/icons/modify.png";
        imgDelete.src = "assets/img/icons/delete.png";
        imgModify.classList.add('icon-admin');
        imgDelete.classList.add('icon-admin');
        imgModify.setAttribute("alt", "Icone administrateur");
        imgDelete.setAttribute("alt", "Icone administrateur");
        adminBox.appendChild(imgModify);
        adminBox.appendChild(imgDelete);
    });
}