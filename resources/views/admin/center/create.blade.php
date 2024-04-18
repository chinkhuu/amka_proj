@extends('layouts.admin')

@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        Center Create
                    </h3>
                </div>

                <form class="form" action="{{ route('admin.center-insert') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">Game Center-ийн нэр:</label>
                            <div class="col-12">
                                <input class="form-control" name="name" type="text" value="{{old('name')}}"
                                       id="name" required/>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-2 col-form-label">Game Center-ийн хаяг:</label>
                            <div class="col-12">
                                <input class="form-control" name="address" type="text" value="{{old('address')}}"
                                       id="address" required/>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="google_map_link" class="col-2 col-form-label">Google Map Link:</label>
                            <div class="col-12">
                                <input class="form-control" name="google_map_link" type="text" value="{{old('google_map_link')}}"
                                       id="google_map_link" required/>
                                @error('google_map_link') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Зураг хавсаргана уу</label>
                            <div></div>
                            <div class="custom-file">
                                <input name="image" type="file" class="custom-file-input form-control" id="image" value="{{old('image')}}"/>
                                <label class="custom-file-label" for="image" >Зураг хавсаргана уу</label>
                            </div>
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label for="description">Дэлгэрэнгүй</label>

                            <textarea class="form-control" id="description" name="description" rows="3" required>{{old('description')}}</textarea>
                        </div>




                        <div class="form-group row">
                            <label class="col-3 col-form-label" for="food_status">Хоол гаргадаг эсэх:</label>
                            <div class="col-3">
                                <span class="switch">
                                    <label>
                                        <input type="checkbox" name="food_status" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                            @error('food_status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group row">
                            <label for="open_time" class="col-2 col-form-label">Game Center нээх цаг</label>
                            <div class="col-10">
                                <input class="form-control" type="time"
                                       name="open_time" id="open_time"
                                       value="{{old('open_time')}}" required
                                />
                            </div>
                            @error('open_time') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>


                        <div class="form-group row">
                            <label for="close_time" class="col-2 col-form-label">Game Center хаах цаг</label>
                            <div class="col-10">
                                <input class="form-control" type="time"
                                       name="close_time" id="open_time"
                                       value="{{old('close_time')}}" required
                                />
                            </div>
                            @error('close_time') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <br><hr>

                        <div class="form-group row">
                            <label for="ordinary_seat_number" class="col-2 col-form-label">Энгийн суудлын тоо</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="{{old('ordinary_seat_number')}}"
                                       id="ordinary_seat_number"
                                       name="ordinary_seat_number"
                                       min="1"
                                       required
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ordinary_seat_price" class="col-2 col-form-label">Энгийн суудлын үнэ</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="{{old('ordinary_seat_price')}}"
                                       id="ordinary_seat_price"
                                       name="ordinary_seat_price"
                                       min="1"
                                       required
                                />
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <label for="editor">Энгийн суудлын компьютерийн үзүүлэлт</label>
                            <textarea class="ckeditor form-control" id="editor" rows="3" name="ordinary_computer_performance">
                                {{ old('ordinary_computer_performance') }}
                            </textarea>
                        </div>

                        <br><hr>
                        <div class="form-group row">
                            <label for="vip_room_number" class="col-2 col-form-label">VIP өрөөний тоо</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="{{old('vip_room_number')}}"
                                       id="vip_room_number"
                                       name="vip_room_number"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vip_room_seat_number" class="col-2 col-form-label">VIP өрөөний суудлын тоо</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="{{old('vip_room_seat_number')}}"
                                       id="vip_room_seat_number"
                                       name="vip_room_seat_number"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vip_room_seat_price" class="col-2 col-form-label">VIP өрөөний суудлын үнэ</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="{{old('vip_room_seat_price')}}"
                                       id="vip_room_seat_price"
                                       name="vip_room_seat_price"
                                />
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <label for="editor_2">VIP суудлын компьютерийн үзүүлэлт</label>
                            <textarea class="ckeditor form-control" id="editor_2" rows="3" name="vip_computer_performance">{{ old('vip_computer_performance') }}</textarea>
                        </div>

                        <hr><br>

                        <div class="form-group">
                            <label>Game Center зурагнууд оруулна уу /олныг сонгох боломжтой/</label>
                            <div></div>
                            <div class="custom-file">
                                <input name="center_image[]" type="file" multiple class="custom-file-input form-control"
                                       id="center_image"/>
                                <label class="custom-file-label" for="center_image">Choose file</label>
                            </div>
                            @error('center_image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <br><hr>

                        <div class="form-group row">
                            <label for="user_name" class="col-2 col-form-label">Moderator Name</label>
                            <div class="col-10">
                                <input class="form-control" type="text"
                                       value="{{old('user_name')}}"
                                       name="user_name"
                                       required
                                       id="user_name"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_email">Moderator Email</label>
                            <input type="email" class="form-control"
                                   id="email"
                                   name="email"
                                   placeholder="Enter email"
                                   required
                                   value="{{old('email')}}"/>
                        </div>

                        <div class="form-group">
                            <label for="password">Moderator Password</label>
                            <input type="password" class="form-control"
                                   id="password"
                                   name="password"
                                   required
                                   value="{{old('password')}}"
                                   placeholder="Password"
                            />
                        </div>


                        <div class="card-footer">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success mr-2">SAVE</button>
                                    <button type="button" class="btn btn-secondary" onclick="goBack()">BACK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/super-build/ckeditor.js"></script>
    <!--
        Uncomment to load the Spanish translation
        <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/super-build/translations/es.js"></script>
    -->
    <script>
        // This sample still does not showcase all CKEditor&nbsp;5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF','exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ]
        });
    </script>

    <script>
        // This sample still does not showcase all CKEditor&nbsp;5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor_2"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF','exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ]
        });
    </script>
@endsection
