
var inHurry = false;
var keywords = [""];
alert('tite');
// First Question

function q1T() {
	document.getElementById("q2").style.display = "block";
	document.getElementById("q1").style.display = "none";
    document.getElementById("q-text").textContent = "How many people are you?";
    inHurry = true;
}

function q1F() {
	document.getElementById("q2").style.display = "block";
	document.getElementById("q1").style.display = "none";
    document.getElementById("q-text").textContent = "How many people are you?";
}

// Second Question

function q2a1() {
    if (inHurry) { 
        document.getElementById("q3_T").style.display = "block"; 
        document.getElementById("q-text").textContent = "Pick food types:";
    } 
    else { document.getElementById("q3_F").style.display = "block"; }

    keywords.push("1");
    
    alert(keywords[0]);

	document.getElementById("q2").style.display = "none";
}

function q2a2() {
    if (inHurry) { 
        document.getElementById("q3_T").style.display = "block"; 
        document.getElementById("q-text").textContent = "Pick food types:";
    } 
    else { document.getElementById("q3_F").style.display = "block"; }

	document.getElementById("q2").style.display = "none";
}

function q2a3() {
    if (inHurry) { 
        document.getElementById("q3_T").style.display = "block"; 
        document.getElementById("q-text").textContent = "Pick food type(s):";
    } 
    else { document.getElementById("q3_F").style.display = "block"; }

	document.getElementById("q2").style.display = "none";
}

function q2a4() {
    if (inHurry) { 
        document.getElementById("q3_T").style.display = "block"; 
        document.getElementById("q-text").textContent = "Pick food types:";
    } 
    else { document.getElementById("q3_F").style.display = "block"; }

	document.getElementById("q2").style.display = "none";
}

function foodTypeProceed() {
    if (inHurry) { 
        document.getElementById("q4_T").style.display = "block"; 
        document.getElementById("q-text").textContent = "How strong do you eat?";
    } 
    else { document.getElementById("q4_F").style.display = "block"; }

	document.getElementById("q3_T").style.display = "none";
}

