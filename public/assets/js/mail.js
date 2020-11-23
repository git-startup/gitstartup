function open_contacts_list() {
  var contacts = document.getElementById("contacts_list");
    if (contacts.style.display == 'none') {
        contacts.style.display = 'block';
    } else {
        contacts.style.display = 'none';
    }

    // to remove border bottom from contact name
    document.getElementById('contact_name').style.borderBottom = '0px';
}
