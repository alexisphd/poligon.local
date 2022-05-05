@php
    /** @var \App\Models\BlogPost $item */
    /** @var \Illuminate\Support\Collection $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title">
                    <div class="card-subtitle md-2 text-muted">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">
                                    Основные данные
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#adddata" role="tab">
                                    Дополнительные данные
                                </a>
                            </li>
                        </ul>
                        <br>
                        <div class="tab-content">
                            <div class="tab-pane active" id="maindata" role="tabpanel">
                                <div class="form-group">
                                    <label for="title">
                                        Заголовок
                                    </label>
                                    <input name="title" value="{{$item->title}}"
                                    id="title"
                                    type="text"
                                    class="form-control"
                                    minlength="3"
                                    required>
                                </div>
                                <div class="form-group">
                                    <label for="content_raw">Статья</label>
                                    <textarea name="content_raw"
                                              id="content_raw"
                                              rows="20"
                                    class="form-control">
                                        {{old('content_raw', $item->content_raw)}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="adddata" role="tabpanel">
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select name="category_id" id="category_id"
                                    class="form-control"
                                    placholder="Выберите категория"
                                    required>
                                        @foreach($categoryList as $categoryOption)
                                            <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id==$item->category_id) selected
                                                @endif>
                                                {{$categoryOption->id_title}}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="slug">Идентификатор</label>
                                    <input type="text"
                                    name="slug"
                                    id="slug"
                                    class="form-control"
                                    value="{{$item->slug}}">
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Выдержка</label>
                                    <textarea name="excerpt" id="excerpt"
                                              rows="3"
                                    class="form-control">
                                        {{old('excerpt', $item->excerpt)}}
                                    </textarea>
                                </div>
                                <div class="form-check">
                                    <input type="hidden"
                                    name="is_published"
                                    value="0">

                                    <input name="is_published"
                                    type="checkbox"
                                    class="form-check-input"
                                    value="{{$item->is_published}}"
                                    @if($item->is_published) checked
                                        @endif>
                                    <label for="form-check-label">Опубликовано</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
