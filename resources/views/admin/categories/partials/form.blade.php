<div class="row">
    <div class="col-sm-12">
        <div class="mb-3">
            {!! Form::label('name', 'Name Category', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name category', 'autofocus']) !!}
        </div>
    </div><!-- Col -->
    <div class="col-sm-12">
        <div class="mb-3">
            {!! Form::label('slug', 'Slug Category', ['class' => 'form-label']) !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug category']) !!}
        </div>
    </div><!-- Col -->
    <div class="col-sm-12">
        <div class="mb-3">
            {!! Form::label('content', 'Content category', ['class' => 'form-label']) !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Enter content category']) !!}
        </div>
    </div><!-- Col -->
</div><!-- Row -->
