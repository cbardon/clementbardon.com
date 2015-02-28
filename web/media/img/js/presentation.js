
window.onload = function()
{ 
    var champsPhoto = document.getElementById('inputMult1');
    champsPhoto.onchange = function()
    {
        var listeFichiers = champsPhoto.files;
        var ul = document.getElementById('champsPhoto');
        ul.innerHTML = '';
        for ( var i = 0; i < listeFichiers.length; i ++ )
        {
			var unFichier = listeFichiers[i];
			li = document.createElement("li");
			li.innerHTML = unFichier.name;
			ul.appendChild(li);
        }
    };
    
    var champsDonnees = document.getElementById('inputMult2');
    champsDonnees.onchange = function()
    {
        var listeFichiers = champsDonnees.files;
        var ul = document.getElementById('champsDonnee');
        ul.innerHTML = '';
        for ( var i = 0; i < listeFichiers.length; i ++ )
        {
			var unFichier = listeFichiers[i];
			li = document.createElement("li");
			li.innerHTML = unFichier.name;
			ul.appendChild(li);
        }
    };
};
