$(document).ready(function () {

    $.get("slide_numbers.txt", function (data) {
        // console.log(data);
        $(".dress-textarea").text(data);
    });
    $.get("preferences.txt", function (pdata) {
        const data = parseFileContent(pdata);
        const textSize = data.TEXT_SIZE;
        const textFont = data.TEXT_FONT;
        const titleSize = data.TITLE_SIZE;
        const titleFont = data.TITLE_FONT;
        const subtitleSize = data.SUBTITLE_SIZE;
        const subtitleFont = data.SUBTILE_FONT;
        const picWidth = data.PIC_WIDTH !== undefined && data.PIC_WIDTH !== null ? data.PIC_WIDTH : -1;
        const picHeight = data.PIC_HEIGHT !== undefined && data.PIC_HEIGHT !== null ? data.PIC_HEIGHT : -1;
        $("#text-size").val(textSize);
        $("#text-font").val(textFont);
        $("#title-size").val(titleSize);
        $("#title-font").val(titleFont);
        $("#subtitle-size").val(subtitleSize);
        $("#subtitle-font").val(subtitleFont);
        $("#pic-width").val(picWidth);
        $("#pic-height").val(picHeight);
    });


});

function parseFileContent(content) {
    // Split the content into lines
    const lines = content.split("\n");

    // Initialize an empty object to store key-value pairs
    const data = {};

    // Iterate through each line and extract key-value pairs
    for (const line of lines) {
        const parts = line.split("=");
        if (parts.length === 2) {
            const key = parts[0].trim();
            const value = parts[1].trim();
            data[key] = value;
        }
    }

    return data;
}
