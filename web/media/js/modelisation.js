var scene, camera, renderer, racine;
var geometry, material, plane, raycaster, manager, controls;
var cameras = [];


var posx,posy,posz,anglex,angley,anglez;

posx = null;

//initialise la scene et le modèle 3D
function initM(cheminModele,cheminTexture,photos) {
    // racine contiendra tous les elements 3D
    racine = new THREE.Object3D();
    // création de la scene
    scene = new THREE.Scene();
    
    var scale = 40;
    
    // initialise a camera
    camera = new THREE.PerspectiveCamera( 400, window.innerWidth / window.innerHeight, 1, 5000 );
    camera.position.z = 1000;
    camera.position.x = 0;
    camera.position.y = 0;
    camera.rotation.z = 0;
    camera.rotation.x = 0;
    camera.rotation.y = 0;
    scene.add(camera);
    
    // orbit controls (mouvement a la souris)
    controls = new THREE.OrbitControls( camera , document.getElementById('move'));
    controls.damping = 0.2;
	controls.addEventListener( 'change', render );

    // lumière
	var ambient = new THREE.AmbientLight( 0xFFFFFF);
	racine.add( ambient );
    /*
	//	var directionalLight = new THREE.DirectionalLight( 0xFFFFFF);
	var light	= new THREE.DirectionalLight( 0xffffff, 1 );
	light.position.set(5,5,5);
	scene.add( light );
	light.castShadow	= true;
	light.shadowCameraNear	= 0.01;
	light.shadowCameraFar	= 15;
	light.shadowCameraFov	= 45;
	light.shadowCameraLeft	= -1;
	light.shadowCameraRight	=  1;
	light.shadowCameraTop	=  1;
	light.shadowCameraBottom= -1;
	light.shadowCameraVisible	= true
	light.shadowBias	= 0.001;
	light.shadowDarkness	= 0.2;
	light.shadowMapWidth	= 1024;
	light.shadowMapHeight	= 1024;
    */
    
    // skybox
	var skyboxGeometry  = new THREE.SphereGeometry(1000, 700, 800)
	var skyboxMaterial  = new THREE.MeshBasicMaterial();
    skyboxMaterial.map   = THREE.ImageUtils.loadTexture('../../media/img/webGL/image.png');
    skyboxMaterial.side  = THREE.BackSide;
    var mesh  = new THREE.Mesh(skyboxGeometry, skyboxMaterial);
    scene.add(mesh);
    
    // creation du manager pour le chargement des objets et textures
    manager = new THREE.LoadingManager();
    manager.onProgress = function ( item, loaded, total ) 
    {
        console.log("Loading: " + item, loaded, total );
    };
    
    // chargement de la texture
    var texture = new THREE.Texture();
    var loader = new THREE.ImageLoader(manager);
    
    loader.load(cheminTexture, function(image)
    {
        texture.image = image;
        texture.needsUpdate = true;
    });
    
    // chargement de l'objet 3D
	var loader = new THREE.OBJLoader( manager );
	loader.load(cheminModele, function ( object ) 
	{
		object.traverse( function ( child ) 
		{
			if ( child instanceof THREE.Mesh ) 
			{
				child.material.map = texture;
				child.material.index0AttributeName = "position";
			}
		} );

    		object.scale.x = scale;
            object.scale.y = scale;
            object.scale.z = scale;

    		racine.add( object );

	} );
	
	// chargement des differente photos et creation des cameras 3D
	var i;
	/* a decommenter
    for (i = 0; i < photos.length; ++i) {
        var image = photos[i];
        racine.add(creerCamera(image['cheminP'],image['infos']['pos'],image['infos']['matrice'],image['infos']['focal'],scale,image['format'],image['coefConv'],image['largeur']));
    }
    */
    object = new THREE.AxisHelper( 50 );
	object.position.set( 0, 0, 0 );
	scene.add( object );

    // ajout de la racine dans la scene
    racine.rotation.z = Math.PI;
    scene.add( racine );
    
	// création du renderer
	raycaster = new THREE.Raycaster();
	renderer = new THREE.WebGLRenderer( { antialias: false } );
    renderer.setSize( window.innerWidth, window.innerHeight );
    
    // placement du renderer dans la page
    var elem = document.getElementById("modele3d");
	elem.appendChild( renderer.domElement );
	
	// ajout des evenements
	window.addEventListener( 'resize', onWindowResize, false );
	document.addEventListener( 'dblclick', onDocumentMouseDown, false );
	document.addEventListener( 'mousedown', resetPosCamera, false );
	
	render();
}

// fonction qui permet de mettre a jour les contoles et l'affichage 
function animateM() {
	requestAnimationFrame( animateM );
	controls.update();
	render();
}

// mise a jour de l'affichage
function render() {
    moveCamera();
    renderer.render( scene, camera );
}

// adapte les elements si la fenetre est redimensionnee
function onWindowResize() {

  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();

  renderer.setSize( window.innerWidth, window.innerHeight );

  render();

}

// creer une camera 3D
function creerCamera(image,pos,matrice,focus,scale,format,coefConv,largeur)
{
    var formatTab = format.split("X");
    var focal = coefConv * ((focus*format[1])/largeur);
    var hauteur = (largeur/formatTab[1]*formatTab[0])/scale;
    largeur = largeur/scale;
    focal = focal*scale;
    console.log('real focal = '+ focal);
    
    var texture = new THREE.Texture();
    var loader = new THREE.ImageLoader(manager);
    loader.load(image, function(image)
    {
        texture.image = image;
        texture.needsUpdate = true;
    });
    
    var geometry = new THREE.PlaneBufferGeometry( largeur, hauteur);
    
	var material = new THREE.MeshBasicMaterial({ 
		map: texture, 
		overdraw: true, 
		transparent: true, 
		opacity: 0.5
	});
	material.index0AttributeName = "position";
	
	var plane = new THREE.Mesh( geometry, material ); 
	plane.material.side = THREE.DoubleSide;
	plane.position.x = 0;
    plane.position.y = 0;
    plane.position.z = focal;
    plane.rotation.z = Math.PI;
	
	var objPlane = new THREE.Object3D();
    objPlane.add(plane);
    objPlane.position.x = 0;
    objPlane.position.y = 0;
    objPlane.position.z = 0;
    
    var testcamera = new THREE.Object3D();
	testcamera.add(createcamera3D(largeur,hauteur,-focal));

    cameras.push(plane);
    
    var node = new THREE.Object3D();
    node.add( objPlane );
	node.add(testcamera);
    
    node.position.x = -pos['x'];//*scale;
    node.position.y = -pos['y'];//*scale;
    node.position.z = -pos['z'];//*scale;
    
    var m = new THREE.Matrix4;
    m.set(matrice[0][0],matrice[0][1],matrice[0][2],matrice[0][3],matrice[1][0],matrice[1][1],matrice[1][2],matrice[1][3],matrice[2][0],matrice[2][1],matrice[2][2],matrice[2][3],matrice[3][0],matrice[3][1],matrice[3][2],matrice[3][3]);
    //m.getInverse(m);
    
    node.quaternions = true;
    node.quaternion.setFromRotationMatrix(m);
    //node.quaternion.inverse();
    return node;
}

// se positionne devant une photo si celle-ci est double clickee
function onDocumentMouseDown( event ) {

    resetPosCamera();
    if (event.which == 1){
    	event.preventDefault();
    
    	var vector = new THREE.Vector3();
    	vector.set( ( event.clientX / window.innerWidth ) * 2 - 1, - ( event.clientY / window.innerHeight ) * 2 + 1, 0.5 );
    	vector.unproject( camera );
    
    	raycaster.ray.set( camera.position, vector.sub( camera.position ).normalize() );
    
    	var intersects = raycaster.intersectObjects( cameras );
    
    	if ( intersects.length > 0 ) {

            var rotation = new THREE.Euler().setFromQuaternion( intersects[ 0 ].object.parent.parent.quaternion, 'XYZ' );
            controls.target = intersects[ 0 ].object.position.clone();
            anglex = rotation.x;
            angley = rotation.y;
            anglez = rotation.z;
            
            posx = intersects[ 0 ].object.parent.parent.position.x;
            posy = intersects[ 0 ].object.parent.parent.position.y;
            posz = intersects[ 0 ].object.parent.parent.position.z;
            
            console.log('x : ' + posx);
            console.log('y : ' + posy);
            console.log('z : ' + posz);
    	}
    }
}

// débloque la camera
function resetPosCamera()
{
    anglex = null;
    angley = null;
    anglez = null;
    
    posx = null;
    posy = null;
    posz = null;
}

// bouge la camera a son point de départ
function moveToStartPosCamera()
{
    anglex = 0;
    angley = 0;
    anglez = 0;
    posx = 0;
    posy = 0;
    posz = 1000;
}

// bouge la camera
function moveCamera() {
    if (posx != null)
    {
        camera.rotation.x = anglex;
        camera.rotation.y = angley;
        camera.rotation.z = anglez;
        
        camera.position.x = posx;
        camera.position.y = posy;
        camera.position.z = posz;
    }
}

// creer une face triangulaire
function createFace(v1,v2,v3){
    
    
    var geometry = new THREE.Geometry();
    geometry.vertices.push(
    	v1,
    	v2,
    	v3
    );
    geometry.faces.push( new THREE.Face3( 0, 1, 2 ) );
    geometry.computeBoundingSphere();
    
    var material = new THREE.MeshNormalMaterial();
    material.index0AttributeName = "position";
    material.wireframe = true;
    
    var mesh = new THREE.Mesh(geometry, material);
    mesh.rotation.y = Math.PI/2;
    return mesh;
}

// creer l'objet camera 3D sans le panneau photo
function createcamera3D(l, h, f) {
    
    var camera3D = new THREE.Object3D();
    
    camera3D.add(createFace(new THREE.Vector3(0, 0, 0),new THREE.Vector3(f, h/2, -l/2),new THREE.Vector3(f, h/2, l/2)));
    camera3D.add(createFace(new THREE.Vector3(0, 0, 0),new THREE.Vector3(f, h/2, -l/2),new THREE.Vector3(f, -h/2, -l/2)));
    camera3D.add(createFace(new THREE.Vector3(0, 0, 0),new THREE.Vector3(f, -h/2, -l/2),new THREE.Vector3(f, -h/2, l/2)));
    camera3D.add(createFace(new THREE.Vector3(0, 0, 0),new THREE.Vector3(f, h/2, l/2),new THREE.Vector3(f, -h/2, l/2)));
     
    
    return camera3D;
}

// reduit la hauteur et la largeur pour le max des deux soit 64
function reduceTo64(h,l){
    var i;
    while(h>64 || l>64){
        if (h>=l){
            i = h/64;
            h = h/i;
            l = l/i;
        }
        else
        {
            i = l/64;
            h = h/i;
            l = l/i;
        }
    }
    retour = [h,l];
    return retour;
}

    // a supprimer ?
    
    /*
    var loader = new THREE.OBJMTLLoader(manager);
	loader.load( 
	    '../../media/modele/camera/camera.obj','../../media/modele/camera/camera.mtl', function ( objectCamera )
    	{
            objectCamera.traverse(function (child) {
                if (child instanceof THREE.Mesh) 
                {
                    child.material.wireframe = true;
                    child.material.index0AttributeName = "position";
                }
            });
            objectCamera.position.x = 0;
            objectCamera.position.y = 0;
            objectCamera.position.z = 0;

    		objectCamera.scale.x = scale;
            objectCamera.scale.y = scale;
            objectCamera.scale.z = scale;

    		node.add( objectCamera );
    	} 
    );
    */