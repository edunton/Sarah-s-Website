<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>


<form action="process_blog.php" method="post"> 
    
    <h1>Password</h1>
    <input type="password" name="Password"/>

    <h1>Post to Blog</h1>  

    <h3>Title</h3>
    <input type="text" name="Title"/>

    <h3>Post</h3>
    <textarea name="Post" cols="50" rows="10"></textarea>

    <input type="submit" name="Text">

    <h1>Post Picture/YouTube Video</h1>
    
    <h3>Select Section</h3>
    <input type="radio" name="Section" value='Paintings' checked >Paintings/Drawings (pictures)<br>
    <input type="radio" name="Section" value='Photography'>Photography (pictures)<br>
    <input type="radio" name="Section" value='Film'>Film (youtube)<br>
    <input type="radio" name="Section" value='Animations'>Animations (youtube)<br>
    <input type="radio" name="Section" value='Storyboards'>Storyboards (pictures)<br>

    <h3>Thumbnail Path (Make it 200x200)</h3>
    <input type="text" name="Thumbnail"/>

    <h3>Content Path (if youtube, just code e.g. a0qMe7Z3EYg)</h3>
    <input type="text" name="Content"/>

    <h3>Captions</h3>
    <textarea name="Caption" cols="30" rows="10"></textarea>

    <input type="submit" name="Picture"/>

</form>

</body>
</html>