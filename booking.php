<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('inc/links.php')?>
</head>
<body>
    <form>
    <div class="row align-items-end">
        <div class="col-lg-3 mb-3">
        <label class="form-label">Check In</label>
        <input type="date" class="form-control shadow-none">
        </div>
        <div class="col-lg-3 mb-3">
        <label class="form-label">Check Out</label>
        <input type="date" class="form-control shadow-none">
        </div>
        <div class="col-lg-3 mb-3">
        <label class="form-label">Rooms</label>
        <select class="form-control shadow-none">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        </div>
        <div class="col-lg-3 mb-3">
        <label class="form-label">Adults</label>
        <select class="form-control shadow-none">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        </div>
        <div class="col-lg-3 mb-3">
        <label class="form-label">Children</label>
        <select class="form-control shadow-none">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        </div>
        <div class="col-lg-3 mb-3">
        <label class="form-label">Room Type</label>
        <select class="form-control shadow-none">
            <option value="1">Standard</option>
            <option value="2">Deluxe</option>
            <option value="3">Suite</option>
        </select>
        </div>
        <div class="col-lg-3 mb-3">
        <label class="form-label">Promo Code</label>
        <input type="text" class="form-control shadow-none">
        </div>
        <div class="col-lg-3 mb-3">
        <button type="submit" class="btn btn-primary shadow-none">Search</button>
        </div>
    </div>
</form>
</body>
</html>