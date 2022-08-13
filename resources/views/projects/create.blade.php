<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Project</title>
</head>
<body>
    <h1>Create a Project</h1>

    <form action="/projects" method="POST">
        @csrf

        <div class="field">
            <label for="title" class="label">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="title" id="title">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>

            <div class="control">
                <textarea name="description" id="description" class="textarea"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link">Create</button>
            </div>
        </div>
    </form>
</body>
</html>
