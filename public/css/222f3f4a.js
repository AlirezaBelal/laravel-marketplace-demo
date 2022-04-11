/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/shared/adroRetargeting.js]*/
StickyRetargeting = (function () {
    StickyRetargeting.addToCartElement = '';
    StickyRetargeting.hostId = 9;
    StickyRetargeting.userId = 1;
    StickyRetargeting.apibaseAddress = "https://api.stickytracker.net";
    StickyRetargeting.Is_Ready = false;
    StickyRetargeting.eventBuffer = [];

    LoadIframe(StickyRetargeting.apibaseAddress);

    StickyRetargeting.EventListener = function (fn) {
        try {
            if (StickyRetargeting.Is_Ready) {
                fn();
            } else {
                StickyRetargeting.eventBuffer.push(fn)
            }
        } catch (e) {
            console.warn(e);
        }
    };

    StickyRetargeting.initiated = function () {
        for (var i = 0; i < StickyRetargeting.eventBuffer.length; ++i)
            StickyRetargeting.eventBuffer[i]();
    };

    StickyRetargeting.View_Products = function (productDetails, callback, callbackData) {
        if (!StickyRetargeting.Is_Ready) {
            console.log("Sticky is not loaded");
            return;
        }

        if (!productDetails)
            return console.warn("adre - productDetails is empty!");

        var ProductDatas = {};
        ProductDatas.HostId = StickyRetargeting.hostId;
        ProductDatas.UserId = StickyRetargeting.userId;
        ProductDatas.PageAddress = window.location.href;
        ProductDatas.ProductData = ProductDatas.ProductData || [];
        for (var i = 0; i < productDetails.length; i++) {
            ProductDatas.ProductData.push(productDetails[i]);
        }
        StickyRetargeting.SendDataToServer(ProductDatas, "/ProductUpdate", callback, callbackData);
    };

    StickyRetargeting.Add_Products = function (productDetails, callback, callbackData) {
        if (!StickyRetargeting.Is_Ready) {
            console.log("Sticky is not loaded");
            return;
        }
        var ProductDatas = {};
        ProductDatas.HostId = StickyRetargeting.hostId;
        ProductDatas.UserId = StickyRetargeting.userId;
        ProductDatas.PageAddress = window.location.href;
        for (var i = 0; i < productDetails.length; i++) {
            productDetails[i].Added = true;
            ProductDatas.ProductData.push(productDetails[i]);
        }

        StickyRetargeting.SendDataToServer(ProductDatas, "/ProductUpdate", callback, callbackData);
    };

    StickyRetargeting.Add_Product_Ids = function (productIds, callback, callbackData) {
        if (!StickyRetargeting.Is_Ready) {
            console.log("Sticky is not loaded");
            return;
        }
        var ProductDatas = {};
        ProductDatas.ProductData = [];
        for (var wj = 0; wj < productIds.length; wj++) {
            ProductDatas.ProductData.push({ProductId: productIds[wj]});
        }
        ProductDatas.HostId = StickyRetargeting.hostId;
        ProductDatas.UserId = StickyRetargeting.userId;
        ProductDatas.PageAddress = window.location.href;
        StickyRetargeting.SendDataToServer(ProductDatas, "/AdToCart", callback, callbackData);
    };

    StickyRetargeting.Clear_Products = function (productIds, callback, callbackData) {
        if (!StickyRetargeting.Is_Ready) {
            console.log("Sticky is not loaded");
            return;
        }
        var ProductDatas = {};
        ProductDatas.ProductData = [];
        for (var wj = 0; wj < productIds.length; wj++) {
            ProductDatas.ProductData.push({ProductId: productIds[wj]});
        }
        ProductDatas.HostId = StickyRetargeting.hostId;
        ProductDatas.UserId = StickyRetargeting.userId;
        ProductDatas.PageAddress = window.location.href;
        StickyRetargeting.SendDataToServer(ProductDatas, "/RemoveCart", callback, callbackData);
    };

    StickyRetargeting.Buy_Products = function (ids, callback, callbackData) {
        if (!StickyRetargeting.Is_Ready) {
            console.log("Sticky is not loaded");
            return;
        }
        var ProductDatas = {};
        var productIds = ids || [];
        ProductDatas.ProductData = [];
        var websiteProductId = 0;
        for (var wj = 0; wj < productIds.length; wj++) {
            ProductDatas.ProductData.push({ProductId: productIds[wj]});
        }
        ProductDatas.HostId = StickyRetargeting.hostId;
        ProductDatas.UserId = StickyRetargeting.userId;
        ProductDatas.PageAddress = window.location.href;
        StickyRetargeting.SendDataToServer(ProductDatas, "/BuyCart", callback, callbackData);
    };

    StickyRetargeting.SendDataToServer = function (data, address, callback, callbackdata) {
        callback = callback || null;
        callbackdata = callbackdata || null;
        try {
            address = StickyRetargeting.apibaseAddress + address;
            var fetchData = {
                method: 'POST',
                mode: 'cors',
                cache: "no-cache",
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': "application/json; charset=utf-8"
                },
                body: JSON.stringify(data)
            };
            fetch(address, fetchData).then(function () {
                if (callback !== null)
                    callback(callbackdata);
            });
        } catch (er) {
            if (callback !== null)
                callback(callbackdata);
        }

    };

    function LoadIframe(baseAddress) {
        var iframe = document.createElement('iframe');
        iframe.src = baseAddress + '/iframe.html';
        iframe.style.border = "none";
        iframe.style.display = "none";
        document.body.appendChild(iframe);
    }

    return StickyRetargeting;
});