<?php
return [
    "MediaTypeServices"=>[
        "image"=>[
            "extensions"=>[
                "png","jpg","jpeg"
            ],
            "handler"=>\Heydari81\Media\Services\ImageFileService::class
        ],
        "video"=>[
            "extensions"=>[
                "avi","mp4","mkv"
            ],
            "handler"=>\Heydari81\Media\Services\VideoFileService::class
        ],
        "zip"=>[
            "extensions"=>[
                "zip","tar","rar",'pdf'
            ],
            "handler"=>\Heydari81\Media\Services\ZipFileService::class
        ]

    ]
];
