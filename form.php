<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form>
    <table>
        <tr>
            <td>
                <label for="uname">Name</label>
            </td>
            <td>
                <input type="text" id="uname" name="username">
            </td>
        </tr>
        <tr>
            <td>
                <label for="uemail">Email</label>
            </td>
            <td>
                <input type="text" id="uemail" name="usermail">
                <button type="button">Check</button>
            </td>
        </tr>
        <tr>
            <td>
                <label for="age">Age</label>
            </td>
            <td>
                <input type="text" name="userage" id="age" size="2" maxlength="2">
            </td>
        </tr>
        <tr>
            <td>
                <label>Country</label>
            </td>
            <td>
                <input type="text" value="India" name="country" disabled>
            </td>
        </tr>
        <tr>
            <td>
                    <label for="pass">Password</label>
            </td>
            <td>
                    <input type="password" id="pass">
            </td>
        </tr>
        <tr>
            <td>
                <label for="res">Resume</label>
            </td>
            <td>
                <input type="file" id="res">
            </td>
        </tr>
        <tr>
            <td>
                <label>Hobbies</label>
            </td>
            <td>
                <label>
                    <input type="checkbox" checked> Cricket
                </label>
                <label>
                    <input type="checkbox"> Football
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <label>Gender</label>
            </td>
            <td>
                <label>
                    <input type="radio" value="f" name="gender"> Female</label>
                    <label>
                    <input value="m" type="radio" name="gender"> Male</label>
            </td>
        </tr>
        <tr>
            <td>
                    <label for="city">City</label>
            </td>
            <td>
                    <select id="city" name="city">
                        <option disabled selected>--Choose City--</option>
                            <optgroup label="Metros">
                                <option>New Delhi</option>
                                <option>Mumbai</option>
                                <option>Channai</option>
                                <option>Kolkata</option>
                            </optgroup>
                            <optgroup label="Others">
                                <option>Noida</option>
                                <option>Gurgram</option>
                                <option>Faridabad</option>
                                <option>Gaziabad</option>
                            </optgroup>
                    </select>
            </td>
        </tr>
        <tr>
            <td>
                <label>Address</label>
            </td>
            <td>
                <textarea rows="4" cols="40"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Submit">
                <input type="reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>