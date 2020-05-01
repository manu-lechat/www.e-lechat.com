var geometry, material, renderer, scene, camera, first, mesh, Icosahedr1, AllObjects;
var distance = 2500;
var deltaMouseX = 0;
var mouseX = 0,
    mouseY = 0,
    bousole = 0;
var requestId;
var materials = [];



window.onload = function() {

    init_three();
    animate();
};

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

function init_three() {

    console.log('init_three');
    //material = new THREE.MeshPhongMaterial( { color: 0xEDE6E0, shading: THREE.FlatShading } );
    //material = new THREE.MeshBasicMaterial( { color: 0xEDE6E0, wireframe: true } ) ;
    var geometry;

    // on initialise le moteur de rendu
    renderer = new THREE.WebGLRenderer({
        alpha: true,
        antialias: true
    });

    // si WebGL ne fonctionne pas sur votre navigateur vous pouvez utiliser le moteur de rendu Canvas à la place
    // renderer = new THREE.CanvasRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.getElementById('three_container').appendChild(renderer.domElement);

    // on initialise la scène
    scene = new THREE.Scene();

    AllObjects = new THREE.Object3D();

    AllObjects.position.x = 100;
    AllObjects.position.y = 2000;
    AllObjects.position.z = 100;

    scene.add(AllObjects);

    // light
    var light = new THREE.AmbientLight(0x404040); // soft white light
    scene.add(light);

    hemiLight = new THREE.HemisphereLight(0xffffff, 0xffffff, 0.6);
    hemiLight.color.setHSL(0.3, 1,1);
    hemiLight.groundColor.setHSL(1, 1, 1);
    hemiLight.position.set(0, 500, 0);
    scene.add(hemiLight);

    // on initialise la camera que l’on place ensuite sur la scène
    //camera = new THREE.PerspectiveCamera(50, window.innerWidth / 2000, 1, 10000 );

    camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 1, 10000);
    camera.position.x = 0;
    camera.position.y = 1000;
    camera.position.z = 500;

    camera.lookAt(new THREE.Vector3(0, 0, 0));
    scene.add(camera);

    // Icosahedres detail 0
    geometry = new THREE.IcosahedronGeometry(100, 0);
    // material = new THREE.MeshPhongMaterial({
    //     color: 0xeeeeee,
    //     shading: THREE.FlatShading
    // });
//     material = new THREE.LineBasicMaterial( {
// 	color: 0x000000,
// 	linewidth: 1,
// 	linecap: 'round', //ignored by WebGLRenderer
// 	linejoin:  'round' //ignored by WebGLRenderer
// } );

    material = new THREE.MeshBasicMaterial( { color: 0xEDE6E0, wireframe: true } ) ;

    AllObjects.Icosahedr1 = new THREE.Mesh(geometry, material);
    AllObjects.Icosahedr1.position.set(400, 0, 500);
    AllObjects.Icosahedr1.rotation.x = Math.random() * 100;
    AllObjects.add(AllObjects.Icosahedr1);

    AllObjects.Icosahedr2 = new THREE.Mesh(geometry, material);
    AllObjects.Icosahedr2.position.set(-400, 200, 500);
    AllObjects.Icosahedr2.rotation.x = Math.random() * 100;
    AllObjects.add(AllObjects.Icosahedr2);

    AllObjects.Icosahedr3 = new THREE.Mesh(geometry, material);
    AllObjects.Icosahedr3.position.set(400, -500, 500);
    AllObjects.Icosahedr3.rotation.x = Math.random() * 100;
    AllObjects.add(AllObjects.Icosahedr3);

    AllObjects.Icosahedr4 = new THREE.Mesh(geometry, material);
    AllObjects.Icosahedr4.position.set(100, 50, -900);
    AllObjects.Icosahedr4.rotation.x = Math.random() * 100;
    AllObjects.add(AllObjects.Icosahedr4);

    AllObjects.Icosahedr5 = new THREE.Mesh(geometry, material);
    AllObjects.Icosahedr5.position.set(-400, -400, -2500);
    AllObjects.Icosahedr5.rotation.x = Math.random() * 100;
    AllObjects.add(AllObjects.Icosahedr5);

    AllObjects.Icosahedr6 = new THREE.Mesh(geometry, material);
    AllObjects.Icosahedr6.position.set(400, -600, -1500);
    AllObjects.Icosahedr6.rotation.x = Math.random() * 100;
    AllObjects.add(AllObjects.Icosahedr6);

    AllObjects.Icosahedr7 = new THREE.Mesh(geometry, material);
    AllObjects.Icosahedr7.position.set(-800, -800, -1500);
    AllObjects.Icosahedr7.rotation.x = Math.random() * 100;
    AllObjects.add(AllObjects.Icosahedr7);

    AllObjects.Icosahedr8 = new THREE.Mesh(geometry, material);
    AllObjects.Icosahedr8.position.set(0, -1500, 500);
    AllObjects.Icosahedr8.rotation.x = Math.random() * 100;
    AllObjects.add(AllObjects.Icosahedr8);

    material = new THREE.MeshPhongMaterial( { color: 0xEDE6E0, shading: THREE.FlatShading } );

    var m;
    for (var i = 0; i < 20; i++) {

        var geometry = new THREE.IcosahedronGeometry(Math.random() * 50, 0);

        if (m<materials.length)  { m++; }else{ m = 1; }
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

    material = new THREE.MeshPhongMaterial( { color: 0x000000, shading: THREE.FlatShading } );

    for (var i = 0; i < 20; i++) {

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

    AllObjects.Icosahedr1.rotation.x += 0.01;
    AllObjects.Icosahedr2.rotation.x -= 0.01;
    AllObjects.Icosahedr3.rotation.x += 0.001;
    AllObjects.Icosahedr3.rotation.y += 0.02;
    AllObjects.Icosahedr4.rotation.x += 0.01;
    AllObjects.Icosahedr4.rotation.y += 0.02;
    AllObjects.Icosahedr5.rotation.x -= 0.01;
    AllObjects.Icosahedr5.rotation.y += 0.02;
    AllObjects.Icosahedr6.rotation.x += 0.01;
    AllObjects.Icosahedr6.rotation.y -= 0.02;
    AllObjects.Icosahedr7.rotation.x += 0.01;
    AllObjects.Icosahedr7.rotation.y -= 0.02;
    AllObjects.Icosahedr8.rotation.x += 0.01;
    AllObjects.Icosahedr8.rotation.y -= 0.02;

    bousole += 0 //.001; //* mouseX;
    if (Math.abs(bousole) <= 0.010) {
        bousole *= 0.95;
    }
    AllObjects.rotation.y += 0.001; //+ bousole;
    var moveX = 100;
    var moveY = 2000;
    var moveZ = 100;
    // TweenMax.to(AllObjects.position, 45, {
    //     x: moveX,
    //     z: moveZ,
    //     y: moveY
    // });
    camera.lookAt(new THREE.Vector3(0, camera.position.y, 0));
    renderer.render(scene, camera);
    requestId = requestAnimationFrame(animate);
}

function onMouseMove(event) {
    mouseX = (event.clientX - window.innerWidth / 2) / window.innerWidth / 2;
    mouseY = (event.clientY - window.innerHeight / 2) / window.innerHeight / 2;
}

function onWindowResize() {

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}
