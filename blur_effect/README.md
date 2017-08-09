## How it works:
  - This code places two duplicate images on top of each other, places a linear-gradient on top of the top_bg that goes from fully transparent at the bottom, 40% transparent at about  1/4 of the way up and stays there until 3/4 of the way up, then goes back to fully transparent at the top.

  - It then blurs the top_bg image while leaving the bottom_bg to create the illusion that it is a single image being blurred for a certain portion.

  - This was done to achieve a blurred background effect within a specific rectangle area then place clear text over the top - in Wordpress.


## Sources:
Thanks to Jordan Hollinger for writing the post below, it helped me get an MVP working that I could then build into the final version:
- https://jordanhollinger.com/2014/01/29/css-gaussian-blur-behind-a-translucent-box/


## License:
- MIT
- For more information see license file.
