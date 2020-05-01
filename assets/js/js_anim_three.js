var geometry, material, renderer, scene, camera, first, mesh, logo1, AllObjects;
var distance = 1500;
var deltaMouseX = 0;
var mouseX = 0,
	mouseY = 0,
	bousoleX = 0;
	bousoleY = 0;
var requestId;

window.onload = function() {
	if(document.getElementById('three_container')){
		init_three();
		animate();
	}
}

function start() {
	if (!requestId) {
		animate();
	}
}

function stop() {
	if (requestId) {
		window.cancelAnimationFrame(requestId);
		requestId = undefined;
	}
}


function onWindowResize() {

	camera.aspect = window.innerWidth / window.innerHeight;
	camera.updateProjectionMatrix();
	renderer.setSize(window.innerWidth, window.innerHeight);

}

function init_three() {

	var geometry;
	var material = new THREE.MeshPhongMaterial({
		color: 0xeeeeee,
		shading: THREE.FlatShading
	});

	// on initialise le moteur de rendu
	renderer = new THREE.WebGLRenderer({
		alpha: true,
		antialias: true
	});

	// si WebGL ne fonctionne pas sur votre navigateur vous pouvez utiliser le moteur de rendu Canvas à la place
	// renderer = new THREE.CanvasRenderer();
	renderer.setSize(window.innerWidth, window.innerHeight);

	window.addEventListener( 'resize', onWindowResize, false );
	document.getElementById('three_container').appendChild(renderer.domElement);



	// on initialise la scène
	scene = new THREE.Scene();


	AllObjects = new THREE.Object3D();

	AllObjects.position.x = 0;
	AllObjects.position.y = -1000;
	AllObjects.position.z = 0;

	scene.add(AllObjects);



	// light
	var light = new THREE.AmbientLight(0x404040); // soft white light
	scene.add(light);

	hemiLight = new THREE.HemisphereLight(0xffffff, 0xffffff, 0.6);
	hemiLight.color.setHSL(0.6, 1, 0.6);
	hemiLight.groundColor.setHSL(0.095, 1, 0.75);
	hemiLight.position.set(0, 500, 0);
	scene.add(hemiLight);

	// on initialise la camera que l’on place ensuite sur la scène
	//camera = new THREE.PerspectiveCamera(50, window.innerWidth / 2000, 1, 10000 );

	camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 1, 10000);
	camera.position.x = 0;
	camera.position.y = 1000;
	camera.position.z = 1000;

	camera.lookAt(new THREE.Vector3(0, 0, 0));
	scene.add(camera);



	// Icosahedres detail 0
	geometry = new THREE.IcosahedronGeometry(100, 0);
	material = new THREE.MeshPhongMaterial({
		color: 0xeeeeee,
		shading: THREE.FlatShading
	});
	mesh = new THREE.Mesh(geometry, material);
	mesh.position.set(400, 0, 500);
	mesh.rotation.x = Math.random() * 100;
	AllObjects.add(mesh);
	mesh = new THREE.Mesh(geometry, material);
	mesh.position.set(-400, 200, 500);
	mesh.rotation.x = Math.random() * 100;
	AllObjects.add(mesh);
	mesh = new THREE.Mesh(geometry, material);
	mesh.position.set(400, -500, 500);
	mesh.rotation.x = Math.random() * 100;
	AllObjects.add(mesh);
	mesh = new THREE.Mesh(geometry, material);
	mesh.position.set(100, 50, -900);
	mesh.rotation.x = Math.random() * 100;
	AllObjects.add(mesh);
	mesh = new THREE.Mesh(geometry, material);
	mesh.position.set(-400, -400, -2500);
	mesh.rotation.x = Math.random() * 100;
	AllObjects.add(mesh);
	mesh = new THREE.Mesh(geometry, material);
	mesh.position.set(400, -600, -1500);
	mesh.rotation.x = Math.random() * 100;
	AllObjects.add(mesh);
	mesh = new THREE.Mesh(geometry, material);
	mesh.position.set(-800, -800, -1500);
	mesh.rotation.x = Math.random() * 100;
	AllObjects.add(mesh);



	// Icosahedres detail 0 // speciaux

	geometry = new THREE.IcosahedronGeometry(100, 0);
	material = new THREE.MeshPhongMaterial({
		color: 0xffffff,
		shading: THREE.FlatShading
	});
	logo1 = new THREE.Mesh(geometry, material);
	logo1.position.set(0, -1500, 500);
	AllObjects.add(logo1);


	/* particules icosahedres0 */

	var material = new THREE.MeshPhongMaterial({
		color: 0xeeeeee,
		shading: THREE.FlatShading
	});
	for (var i = 0; i < 50; i++) {

		var geometry = new THREE.IcosahedronGeometry(Math.random() * 50, 0);
		var object = new THREE.Mesh(geometry, material);

		object.position.x = Math.random() * 2000 - 1000;
		object.position.y = Math.random() * 2000 - 1000;
		object.position.z = Math.random() * 4000 - 2000;

		object.rotation.x = Math.random() * 2 * Math.PI;
		object.rotation.y = Math.random() * 2 * Math.PI;
		object.rotation.z = Math.random() * 2 * Math.PI;

		AllObjects.add(object);
	}


	/* particules triangulaires */

	var material = new THREE.MeshLambertMaterial({
		color: 0xffffff,
		specular: 0x666666
	});
	for (var i = 0; i < 200; i++) {

		var geometry = new THREE.SphereGeometry(Math.random() * 40, 2, 2);
		var object = new THREE.Mesh(geometry, material);

		object.position.x = Math.random() * 2000 - 1000;
		object.position.y = Math.random() * 4000 - 2000;
		object.position.z = Math.random() * 2000 - 1000;

		object.rotation.x = Math.random() * 2 * Math.PI;
		object.rotation.y = Math.random() * 2 * Math.PI;
		object.rotation.z = Math.random() * 2 * Math.PI;

		object.scale.x = Math.random() + 0.5;
		object.scale.y = Math.random() + 0.5;
		object.scale.z = Math.random() + 0.5;

		AllObjects.add(object);
	}



	// rendu de la scène
	renderer.render(scene, camera);


	window.addEventListener('resize', onWindowResize, false);
	document.addEventListener('mousemove', onMouseMove, false);



}


function animate() {
	//
	bousoleX += 0.0001 * mouseY;
	if (bousoleX > 0.002) {
		bousoleX = 0.002;
	}
	if (bousoleX < -0.002) {
		bousoleX = -0.002;
	}
	AllObjects.rotation.x += bousoleX;
	bousoleY += 0.0001 * mouseX;
	if (bousoleY > 0.002) {
		bousoleY = 0.002;
	}
	if (bousoleY < -0.002) {
		bousoleY = -0.002;
	}
	AllObjects.rotation.y += bousoleY;
	var moveX = 100;
	var moveY = 600;
	var moveZ = 100;
	TweenMax.to(AllObjects.position, 35, {
		x: moveX,
		z: moveZ,
		y: moveY
	});
	camera.lookAt(new THREE.Vector3(0, camera.position.y, 0));
	renderer.render(scene, camera);
	requestId = requestAnimationFrame(animate);
}

function onMouseMove(event) {
	mouseX = (event.clientX - window.innerWidth / 2) / window.innerWidth / 2;
	mouseY = (event.clientY - window.innerHeight / 2) / window.innerHeight / 2;
}
