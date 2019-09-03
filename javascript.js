
function formValidation(form){
    validation = validateUserid(form.user.value)
    validation += validateEmail(form.email.value)
    validation += validateTerms(form.terms.value)
    if (validation=="") return true
    else {alert(validation); return false}
}
function validateUserid(input){
    if (/[^a-zA-Z0-9]/.test(input))
        return 'only alphebet and numbers allowed.\n'
    return ''
}
function validateEmail(input){
    if (/[^a-zA-Z0-9.@_-]/.test(input))
        return 'Invalid email address.\n'
    return ''
}
function validateTerms(input){
    if (input != 'Accept')
        return 'You must accept the terms & conditions'
    return ''
}

function loginover(){ $('#loginnav').css('border', 'solid 1.2px orange')};
function loginout(){ $('#loginnav').css('border', 'solid 1.2px white')};

function focus1() { document.getElementById('firstname2').style.color = 'orange'}
function blur1 () { document.getElementById('firstname2').style.color = 'white'; if (document.getElementsByTagName('INPUT')[0].value.length > 0) (document.getElementById('firstname1').style.color = 'orange')}

function focus2() { document.getElementById('lastname2').style.color = 'orange'}
function blur2 () { document.getElementById('lastname2').style.color = 'white'; if (document.getElementsByTagName('INPUT')[1].value.length > 0) (document.getElementById('lastname1').style.color = 'orange')}

function focus3() { document.getElementById('userid2').style.color = 'orange'}
function blur3 () { document.getElementById('userid2').style.color = 'white'; if (document.getElementsByTagName('INPUT')[2].value.length > 0) (document.getElementById('userid1').style.color = 'orange')}

function focus4() { document.getElementById('password2').style.color = 'orange'}
function blur4 () { document.getElementById('password2').style.color = 'white'; if (document.getElementsByTagName('INPUT')[3].value.length > 0) (document.getElementById('password1').style.color = 'orange')}

function focus5() { document.getElementById('email2').style.color = 'orange'}
function blur5 () { document.getElementById('email2').style.color = 'white'; if (document.getElementsByTagName('INPUT')[4].value.length > 0) (document.getElementById('email1').style.color = 'orange')}

function focus6() { document.getElementById('accept2').style.color = 'orange'; document.getElementById('accept1').style.color = 'orange' }
