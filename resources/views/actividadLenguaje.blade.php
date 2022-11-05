@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:8%">

    <form method="POST" action="/actividad/dibujo/respuesta/{{Auth::user()->id}}/{{$actividad->id}}" enctype="multipart/form-data">
        @csrf
        <div id="canvas-editor" style="margin-bottom: 50px;"></div>
        <input type="hidden" id="image_64_input" name="image_64" required>
        <button type="submit" class="btn btn-primary btn-block" role="button" id="enviarDibujoBtn" style="background: rgb(255 162 108);display:none !important;"> <i class="fa fa-upload"></i> Enviar</button>
        <div style="margin-top:3%;margin-bottom:3%;text-align:center;">
            <h1>Actividad {{$actividad->nombre}}</h1>
        </div>
        <hr>
        <div>
            <div style="text-align:center">
                <h2>¿Necesitas ayuda?</h2>
            </div>
            <br>
            <div class="row">
                <!-- 1 -->
                <div class="col-sm">
                    <p>
                        <a class="btn bg-primary text-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            ¿Cómo empezar a dibujar?
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <p>Para comenzar a dibujar, debes hacer click en la pantalla que dice "Haz click para comenzar a dibujar".</p>
                            <br>
                            <img src="https://i.imgur.com/OW8YsSs.png" width="100%" height="100%">
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div class="col-sm">
                    <p>
                        <a class="btn bg-primary text-light" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                            ¿Como enviar mi dibujo?
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample2">
                        <div class="card card-body">
                            <p>Para enviar el dibujo realizado, debes hacer click fuera del cuadro de dibujo. Luego se habilitará un botón que dice "Enviar". Cuando se presione el botón "Enviar", ¡ya estará publicado tu dibujo!</p>
                            <br>
                            <img src="https://i.imgur.com/NyoY0DV.png" width="100%" height="100%">
                        </div>
                    </div>
                </div>
                <!-- 3 -->
                <div class="col-sm">
                    <p>
                        <a class="btn bg-primary text-light" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                            ¿Como cambiar el color del lapiz?
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample3">
                        <div class="card card-body">
                            <p>Para cambiar el color del lapiz, debes hacer click en el ícono de configuración que está justo debajo del lapiz.</p>
                            <br>
                            <img src="https://i.imgur.com/rXWHamD.png" width="100%" height="100%">
                            <br>
                            <p>Luego debes hacer click en el color actual que está a la derecha de "Fill:". Una vez seleccionado el nuevo color, se puede comenzar a utilizar.</p>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <div class="col-sm">
                    <p>
                        <a class="btn bg-primary text-light" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
                            ¿Donde está la goma de borrar?
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample4">
                        <div class="card card-body">
                            <p>La goma de borrar se puede encontrar en el ícono al costado derecho del lápiz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- dibujos-->

        @if($respuestaImagen)
        <div style="margin-top:3%;margin-bottom:3%;text-align:center;">
            <h1>Mis dibujos anteriores</h1>
            <br>
            <img src="{{$respuestaImagen->imagen}}" style="border: 2px solid #555;width:100%;height:100%">
        </div>
        @endif
</div>
</form>

<script>
    var localization_ru = {
        'Add Drawer': 'Добавить холст для рисования',
        'Insert Drawer': 'Добавить холст',
        'Insert': 'Добавить',
        'Free drawing mode': 'Карандаш',
        'SimpleWhiteEraser': 'Ластик (белый)',
        'Borrador': 'Ластик',
        'Delete this canvas': 'Удалить полотно',
        'Are you sure want to delete this canvas?': 'Вы уверены что хотите удалить полотно?',


        // canvas properties popup
        'Size (px)': 'Размер (px)',
        'Position': 'Позиция',
        'Inline': 'На линии',
        'Left': 'Слева',
        'Center': 'По центру',
        'Right': 'Справа',
        'Floating': 'Плавающий',
        'Canvas properties': 'Свойства холста',
        'Background': 'Фон',
        'transparent': 'прозрачный',
        'Cancel': 'Отмена',
        'Save': 'Сохранить',

        // Fullscreen plugin
        'Enter fullscreen mode': 'Полноэкранный режим',
        'Exit fullscreen mode': 'Выйти из полноэкранного режима',

        // shape context menu plugin
        'Bring forward': 'Переместить выше',
        'Send backwards': 'Переместить ниже',
        'Bring to front': 'Переместить наверх',
        'Send to back': 'Переместить в низ',
        'Duplicate': 'Клонировать',
        'Remove': 'Удалить',

        // brush size plugin
        'Size:': 'Размер:',

        // color plugin
        'Fill:': 'Заливка:',
        'Transparent': 'Прозрачный',
        'None': 'Нет',

        // shape border plugin
        'Border:': 'Граница:',

        // arrow plugin
        'Draw an arrow': 'Стрелка',
        'Draw a two-sided arrow': 'Двухсторонняя стрелка',
        'Lines and arrows': 'Линии и стрелки',

        // circle plugin
        'Draw a circle': 'Круг',

        // line plugin
        'Draw a line': 'Линия',

        // rectangle plugin
        'Draw a rectangle': 'Прямоугольник',

        // triangle plugin
        'Draw a triangle': 'Треугольник',

        // polygon plugin
        'Draw a Polygon': 'Многоугольник',
        'Stop drawing a polygon': 'Закончить рисование многоугольника (esc)',
        'Click to start a new line': 'Кликните для начала новой линии',

        // text plugin
        'Draw a text': 'Текст',
        'Click to place a text': 'Нажмите, чтобы расположить текст',
        'Font:': 'Шрифт:',

        // movable floating mode plugin
        'Move canvas': 'Подвинуть холст',

        // base shape
        'Click to start drawing a ': 'Нажмите, чтобы начать рисовать ',

        // image tool
        'Insert an image': 'Вставить изображение',
        'No file was selected!': 'Не был выбран файл!',
        'Incorrect file type': 'Неверный тип файла!',
        'File is to big!. Maximum file size is ': 'Файл слишком большой! Максимальный размер файла - ',
        'Image failed to create!': 'Не удалось создать изображение!',

        // background image tool
        'Insert a background image': 'Фоновое изображение'
    };

    $(document).ready(function() {
        var drawerPlugins = [
            // Drawing tools
            'Pencil',
            'Eraser',
            'Text',
            'Line',
            'ArrowOneSide',
            'ArrowTwoSide',
            'Triangle',
            'Rectangle',
            'Circle',
            'Image',
            'BackgroundImage',
            'Polygon',
            'ImageCrop',

            // Drawing options
            //'ColorHtml5',
            'Color',
            'ShapeBorder',
            'BrushSize',
            'OpacityOption',

            'LineWidth',
            'StrokeWidth',

            'Resize',
            'ShapeContextMenu',
            'CloseButton',
            'OvercanvasPopup',
            'OpenPopupButton',
            'MinimizeButton',
            'ToggleVisibilityButton',
            'MovableFloatingMode',
            'FullscreenModeButton',

            'TextLineHeight',
            'TextAlign',

            'TextFontFamily',
            'TextFontSize',
            'TextFontWeight',
            'TextFontStyle',
            'TextDecoration',
            'TextColor',
            'TextBackgroundColor'
        ];

        // drawer is created as global property solely for debug purposes.
        // doing  in production is considered as bad practice
        window.drawer = new DrawerJs.Drawer(null, {
            plugins: drawerPlugins,
            corePlugins: [
                'Zoom' // use null here if you want to disable Zoom completely
            ],
            pluginsConfig: {
                Image: {
                    scaleDownLargeImage: true,
                    maxImageSizeKb: 10240, //1MB
                    cropIsActive: true
                },
                BackgroundImage: {
                    scaleDownLargeImage: true,
                    maxImageSizeKb: 10240, //1MB
                    //fixedBackgroundUrl: '/examples/redactor/images/vanGogh.jpg',
                    imagePosition: 'center', // one of  'center', 'stretch', 'top-left', 'top-right', 'bottom-left', 'bottom-right'
                    acceptedMIMETypes: ['image/jpeg', 'image/png', 'image/gif'],
                    dynamicRepositionImage: true,
                    dynamicRepositionImageThrottle: 100,
                    cropIsActive: false
                },
                Text: {
                    editIconMode: false,
                    editIconSize: 'large',
                    defaultValues: {
                        fontSize: 72,
                        lineHeight: 2,
                        textFontWeight: 'bold'
                    },
                    predefined: {
                        fontSize: [8, 12, 14, 16, 32, 40, 72],
                        lineHeight: [1, 2, 3, 4, 6]
                    }
                },
                Zoom: {
                    enabled: true,
                    showZoomTooltip: true,
                    useWheelEvents: true,
                    zoomStep: 1.05,
                    defaultZoom: 1,
                    maxZoom: 32,
                    minZoom: 1,
                    smoothnessOfWheel: 0,
                    //Moving:
                    enableMove: true,
                    enableWhenNoActiveTool: true,
                    enableButton: true
                }
            },
            toolbars: {
                drawingTools: {
                    position: 'top',
                    positionType: 'outside',
                    customAnchorSelector: '#custom-toolbar-here',
                    compactType: 'scrollable',
                    hidden: false,
                    toggleVisibilityButton: false,
                    fullscreenMode: {
                        position: 'top',
                        hidden: false,
                        toggleVisibilityButton: false
                    }
                },
                toolOptions: {
                    position: 'bottom',
                    positionType: 'inside',
                    compactType: 'popup',
                    hidden: false,
                    toggleVisibilityButton: false,
                    fullscreenMode: {
                        position: 'bottom',
                        compactType: 'popup',
                        hidden: false,
                        toggleVisibilityButton: false
                    }
                },
                settings: {
                    position: 'right',
                    positionType: 'inside',
                    compactType: 'scrollable',
                    hidden: false,
                    toggleVisibilityButton: false,
                    fullscreenMode: {
                        position: 'right',
                        hidden: false,
                        toggleVisibilityButton: false
                    }
                }
            },
            defaultImageUrl: '../assets/img/test16.jpg',
            defaultActivePlugin: {
                name: 'Pencil',
                mode: 'lastUsed'
            },
            debug: true,
            activeColor: '#a1be13',
            transparentBackground: true,
            align: 'floating', //one of 'left', 'right', 'center', 'inline', 'floating'
            lineAngleTooltip: {
                enabled: true,
                color: 'blue',
                fontSize: 15
            }
        }, 400, 400);

        $('#canvas-editor').append(window.drawer.getHtml());
        window.drawer.onInsert();


        $(".editable-canvas-image").css("width", "100%");
        $(".editable-canvas-image").css("position", "static");
        $(".editable-canvas-image").css("margin-top", "150px");

    });
</script>

<script>
    const getBase64StringFromDataURL = (dataURL) =>
        dataURL.replace('data:', '').replace(/^.+,/, '');

    setInterval(() => {
        const imageBase64 = document.getElementsByClassName('editable-canvas-image')[0].src;

        if (imageBase64.length > 100) {
            $("#image_64_input").val(imageBase64);
            $("#enviarDibujoBtn").css("display", "block")
            console.log("okok");
        }
    }, 3000);
</script>

@endsection