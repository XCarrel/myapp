$(document).ready(function () {
    $('#txtnewname').keydown(function () {
        checkAddButtonVisibility()
    })
    $('#nbrnewbricks').keydown(function () {
        checkAddButtonVisibility()
    })
    $('#nbrnewbricks').change(function () {
        checkAddButtonVisibility()
    })
})

function checkAddButtonVisibility()
{
    if ($('#txtnewname').val().length > 0 && $('#nbrnewbricks').val() > 0) $('#cmdAdd').removeClass('d-none')
}