<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="col-md-4">
        <form method="POST" action="{{route('xu-ly-them-moi')}} ">
            @csrf
            <div asp-validation-summary="ModelOnly" class="text-danger"></div>
            <div class="form-group">
                <label asp-for="Username" class="control-label">Họ tên</label>
                <input asp-for="Username" class="form-control" />
                <span asp-validation-for="Username" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label asp-for="Email" class="control-label">Email</label>
                <input asp-for="Email" class="form-control" />
                <span asp-validation-for="Email" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label asp-for="Text" class="control-label">Giới tính</label>
                <input asp-for="Text" class="form-control" />
                <span asp-validation-for="Text" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label asp-for="Text" class="control-label">Phân Quyền</label>
                <input asp-for="Text" class="form-control" />
                <span asp-validation-for="Text" class="text-danger"></span>
            </div>
           
            <div class="form-check" >
                <input class="form-check-input" type="checkbox" value="trang_thai" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                 Trạng thái
                </label>
              </div>      
            
            <div class="form-group" >
                <input style="margin-top: 10" type="submit" value="Thêm" class="btn btn-primary" />
            </div>
        </form>
    </div>
    </div>
            
    
    <!--Table-->   
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách giảng viên</h1>
    </div>             
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Họ tên
                    </th>
                    <th>
                       Giới tính
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Phân Quyền
                    </th>
                    <th>
                        Trạng thái
                    </th>
                  
                    <th></th>
                </tr>
            </thead>
            <tbody>
      
                <tr>
                    <td>
                       Huỳnh Công Hậu
                    </td>
                    <td>
                        
                    </td>
                    <td>
                      
                    </td>
                    <td>
                       
                    </td>
                    <td>
                        
                    </td>
                    
                    <td>
                        <a asp-action="Edit" asp-route-id="">Edit</a> |
                        <a asp-action="Details" asp-route-id="">Details</a> |
                        <a asp-action="Delete" asp-route-id="">Delete</a>
                    </td>
                </tr>
        
            </tbody>
        </table>
</body>
</html>
