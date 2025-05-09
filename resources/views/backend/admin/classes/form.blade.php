<div class="mb-3">
    <label for="title" class="form-label">Class Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $class->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="teacher_name" class="form-label">Teacher Name</label>
    <input type="text" name="teacher_name" class="form-control"
        value="{{ old('teacher_name', $class->teacher_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="teacher_image" class="form-label">Teacher Image</label>
    <input type="file" name="teacher_image" class="form-control">
    @if (!empty($class->teacher_image))
        <img src="{{ asset('storage/' . $class->teacher_image) }}" alt="Teacher Image" width="100" class="mt-2">
    @endif
</div>

<div class="mb-3">
    <label for="class_image" class="form-label">Class Image</label>
    <input type="file" name="class_image" class="form-control">
    @if (!empty($class->class_image))
        <img src="{{ asset('storage/' . $class->class_image) }}" alt="Class Image" width="100" class="mt-2">
    @endif
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" step="0.01" name="price" class="form-control"
        value="{{ old('price', $class->price ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="age_range" class="form-label">Age Range</label>
    <input type="text" name="age_range" class="form-control" value="{{ old('age_range', $class->age_range ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label for="time" class="form-label">Class Time</label>
    <input type="text" name="time" class="form-control" value="{{ old('time', $class->time ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="capacity" class="form-label">Capacity</label>
    <input type="number" name="capacity" class="form-control" value="{{ old('capacity', $class->capacity ?? '') }}"
        required>
</div>
