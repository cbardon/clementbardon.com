var scene, camera, renderer;
var geometry, material, plane;

var VITESSE = 512; // prendre pour valeur une puissance de 2 (exemple : 128,256,512,...)
var TPS_PAUSE_MAX = 50; // temps de pause sur une photo (defaut : 50)
var PAUSE = true; // activer la pause sur les photos
var FOCUS_CAMERA = 65; // focus de la caméra (entre 60 et 80 pour un resultat correcte)


var tpsPause = TPS_PAUSE_MAX;
var VITESSE_ROTATION = Math.PI / VITESSE; 
var TPS_INTER_PHOTO = VITESSE/2; 


// Mise en place du carrousel
function initC(image1,image2,image3,image4) {
	// création de la scene
	scene = new THREE.Scene();

	// création et positionnement de la caméra
	camera = new THREE.PerspectiveCamera( FOCUS_CAMERA, window.innerWidth / window.innerHeight, 1, 10000 );
	camera.position.x = 190;
	camera.position.z = 190;
	
	// création de la forme d'un plan
	var geometry = new THREE.PlaneGeometry( 380, 250);
	 
	// création du plan 1 
	var material = new THREE.MeshBasicMaterial({ 
		map: THREE.ImageUtils.loadTexture(image1, new THREE.SphericalReflectionMapping()), overdraw: true 
	});
	var plane = new THREE.Mesh( geometry, material ); 
	plane.material.side = THREE.DoubleSide;
	plane.position.x = 190;
	plane.position.z = 0;
	scene.add( plane );
	// création du plan 2
	var material = new THREE.MeshBasicMaterial({ 
		map: THREE.ImageUtils.loadTexture(image2, new THREE.SphericalReflectionMapping()), overdraw: true 
	});
	var plane = new THREE.Mesh( geometry, material ); 
	plane.material.side = THREE.DoubleSide;
	plane.position.x = 190;
	plane.position.z=380;
	plane.rotation.y = Math.PI;
	scene.add( plane );
	// création du plan 3
	var material = new THREE.MeshBasicMaterial({ 
		map: THREE.ImageUtils.loadTexture(image3, new THREE.SphericalReflectionMapping()), overdraw: true 
	});
	var plane = new THREE.Mesh( geometry, material ); 
	plane.material.side = THREE.DoubleSide;
	plane.position.x = 0;
	plane.position.z=190;
	plane.rotation.y = Math.PI / 2;
	scene.add( plane );
	// création du plan 4
	var material = new THREE.MeshBasicMaterial({ 
		map: THREE.ImageUtils.loadTexture(image4, new THREE.SphericalReflectionMapping()), overdraw: true 
	});
	var plane = new THREE.Mesh( geometry, material ); 
	plane.material.side = THREE.DoubleSide;
	plane.position.x = 380;
	plane.position.z=190;
	plane.rotation.y = 3 * Math.PI / 2
	scene.add( plane );

	// Ajout d'une skybox
	var skyboxGeometry = new THREE.CubeGeometry(10000, 10000, 10000);
	var skyboxMaterial = new THREE.MeshBasicMaterial({ color: 0xf2f2f2, side: THREE.BackSide });
	var skybox = new THREE.Mesh(skyboxGeometry, skyboxMaterial);
	scene.add(skybox);
	
	//création du renderer
	renderer = new THREE.WebGLRenderer({antialias:true});
	renderer.setSize( 900, 300 );
	// ajout du carrousel dans la page
	document.getElementById("carrousel").appendChild( renderer.domElement );

}

// Fait tourner la caméra en réalisant une pause devant chaque photo
function animateC() {
	requestAnimationFrame( animateC );
	if (PAUSE)
	{
		if (tpsPause > 0)
		{
			tpsPause-=1;
			if (tpsPause == 0)
			{
				time = TPS_INTER_PHOTO;
			}
		}
		else if (tpsPause <= 0)
		{
			camera.rotation.y -= VITESSE_ROTATION;
			time --;
			if (time == 0)
			{
				tpsPause = TPS_PAUSE_MAX;
			}
		} 
	}
	else
		camera.rotation.y -= VITESSE_ROTATION;
	renderer.render( scene, camera );
}

function onWindowResize() {

  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();

  renderer.setSize( window.innerWidth, window.innerHeight );

  render();

}
