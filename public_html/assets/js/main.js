document.addEventListener("DOMContentLoaded", function () {
    // ==========================================
    // TẢI DỮ LIỆU DỊCH VỤ BẤT ĐỒNG BỘ (AJAX XML DOM)
    // ==========================================
    var xhr = new XMLHttpRequest();
    var currentPath = window.location.pathname;
    var xmlUrl = "components/services.xml"; 

    if (currentPath.includes("/pages/")) {
        xmlUrl = "../components/services.xml"; 
    }

    xhr.open("GET", xmlUrl, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var xmlDoc = xhr.responseXML;
            var root = xmlDoc.documentElement; 
            
            var tableContent = `
                <div class="table-responsive shadow-sm rounded-3">
                    <table class="table table-bordered table-hover align-middle mb-0 bg-white">
                        <thead class="table-success text-uppercase">
                            <tr>
                                <th scope="col" style="width: 10%;">Mã DV</th>
                                <th scope="col" style="width: 25%;">Tên Dịch Vụ</th>
                                <th scope="col" style="width: 15%;">Giá Tiền</th>
                                <th scope="col">Mô Tả Chi Tiết</th>
                                <th scope="col" style="width: 15%;" class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
            `;

            var serviceNode = root.firstChild;

            while (serviceNode) {
                if (serviceNode.nodeType === 1) {
                    var id = serviceNode.getAttribute("id"); 
                    var name = "", price = "", description = "";
                    var childNode = serviceNode.firstChild;
                    
                    while (childNode) {
                        if (childNode.nodeType === 1) {
                            if (childNode.nodeName === "name") {
                                name = childNode.textContent;
                            } else if (childNode.nodeName === "price") {
                                price = childNode.textContent;
                            } else if (childNode.nodeName === "description") {
                                description = childNode.textContent;
                            }
                        }
                        childNode = childNode.nextSibling;
                    }

                    var formattedPrice = new Intl.NumberFormat('vi-VN').format(price) + 'đ';

                    tableContent += `
                        <tr>
                            <td><span class="badge bg-secondary px-2 py-1">${id}</span></td>
                            <td class="fw-bold text-dark">${name}</td>
                            <td class="text-danger fw-bold">${formattedPrice}</td>
                            <td class="text-muted small">${description}</td>
                            <td class="text-center">
                                <button class="btn btn-success btn-sm rounded-pill px-3">Chọn</button>
                            </td>
                        </tr>
                    `;
                }
                serviceNode = serviceNode.nextSibling;
            }

            tableContent += `
                        </tbody>
                    </table>
                </div>
            `;

            var serviceTableContainer = document.getElementById("xml-services-table-container");
            if (serviceTableContainer) {
                serviceTableContainer.innerHTML = tableContent;
            }
        }
    };

    xhr.send();
});