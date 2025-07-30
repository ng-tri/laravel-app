<div class="form-group mb-3">
    <label>First Name</label>
    <input type="text" name="first_name" value="{{ old('first_name', $customer->first_name ?? '') }}" class="form-control" required>
</div>
<div class="form-group mb-3">
    <label>Last Name</label>
    <input type="text" name="last_name" value="{{ old('last_name', $customer->last_name ?? '') }}" class="form-control" required>
</div>
<div class="form-group mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $customer->email ?? '') }}" class="form-control" required>
</div>
<div class="form-group mb-3">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" class="form-control">
</div>
<div class="form-group mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ old('address', $customer->address ?? '') }}</textarea>
</div>
