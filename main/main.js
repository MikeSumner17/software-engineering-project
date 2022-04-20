const addMemberButton = document.getElementById("#addmember");

addMemberButton.addEventListener("click", (e) => {
    e.preventDefault();
    window.location.href = "../add_member/addmember.html";
})
