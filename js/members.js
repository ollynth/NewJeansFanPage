let membersPhoto = ["../assets/images/members_photo03.jpg", "../assets/images/members_photo04.jpg", "../assets/images/members_photo05.jpg", "../assets/images/members_photo06.jpg", "../assets/images/members_photo07.jpg", "../assets/images/members_photo08.jpg", "../assets/images/members_photo09.jpg", "../assets/images/members_photo10.jpg", "../assets/images/members_photo11.jpg"]

index = 0;
function changeMembersPhoto() {
    index++;

    if (index >= membersPhoto.length) {
        index = 0;
    }
    $('#members-photo-viewer').fadeTo(1000, 0.7, function() {
        $('#members-photo-viewer').attr('src', membersPhoto[index]);
    }).fadeTo(700, 1);
}

setInterval(changeMembersPhoto, 3000);