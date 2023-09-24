$.get("preferences.txt", function (pdata) {
    const data = parseFileContent(pdata);
    // console.log("data",data)
    const textSize = data.TEXT_SIZE;
    const textFont = data.TEXT_FONT;
    const titleSize = data.TITLE_SIZE;
    const titleFont = data.TITLE_FONT;
    const subtitleSize = data.SUBTITLE_SIZE;
    const subtitleFont = data.SUBTILE_FONT;
    const picWidth = data.PIC_WIDTH !== undefined && data.PIC_WIDTH !== null ? data.PIC_WIDTH : null;
    const picHeight = data.PIC_HEIGHT !== undefined && data.PIC_HEIGHT !== null ? data.PIC_HEIGHT : null;
    // console.log("textSize",textSize)
    // console.log("textFont",textFont)
    // console.log("titleSize",titleSize)
    // console.log("titleFont",titleFont)
    // console.log("subtitleSize",subtitleSize)
    // console.log("subtitleFont",subtitleFont)
    // console.log("picWidth",picWidth)
    // console.log("picHeight",picHeight)

    
});