function statusToggle(evt) {
    let item = evt.currentTarget;
    if (item.className.indexOf("w3-text-green") == -1) {
        item.className += " w3-text-green";

    } else {
        item.className = item.className.replace(" w3-text-green", "");
    }
}
